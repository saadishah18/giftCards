<?php

namespace App\Services;

use App\Models\StripeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;
use Stripe\Price;
use Stripe\Product;

class Subscription
{
    public function __construct(){

    }

    public function subscribe(){
        try {

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $authUser = Auth::user();
            $stripeProductPrice = null;

            $notYetPaidSubscription = Subscription::where('store_id', Auth::user()->id)
                ->where('status', 'incomplete')->first();

            $stripeProduct = StripeProduct::first();

            if (!$stripeProduct) {
                $product = $this->createProductInStripe();
                $stripeProductPrice = $this->createProductPrice($product->id);
                //create product in database
                if ($product && $stripeProductPrice) {
                    $stripeProduct = StripeProduct::create([
                        'name' => $product->name,
                        'stripe_product_id' => $product->id,
                        'description' => $product->description,
                        'stripe_price_id' => $stripeProductPrice->id,
                    ]);
                }

            }
            if (empty($authUser->stripe_customer_id)) {
                $customer = $this->createStripeCustomer($authUser, $request->payment_method_id);
                $authUser->stripe_customer_id = $customer->id;
                $authUser->save();
            } else {
                $customer = Customer::retrieve($authUser->stripe_customer_id);
//                if ($customer) {
//                    $paymentMethod = PaymentMethod::retrieve($request->payment_method_id);
//                    $paymentMethod->attach(['customer' => $customer->id]);
//                    Customer::update(
//                        $customer->id,
//                        ['invoice_settings' => [
//                            'default_payment_method' => $request->payment_method_id]
//                        ]
//                    );
//                }
            }
            if (!$customer || !$stripeProduct) {
                return response()->json(['subscription' => null, 'message' => 'something went wrong with customer or product'], 500);
            }

            $subscription = $this->createSubscription($customer->id, $stripeProduct->stripe_price_id);

            if (!$subscription) {
                return response()->json(['subscription' => null, 'message' => 'subscription failed'], 500);
            }
            Subscription::create([
                'subscription_id' => $subscription->id,
                'stripe_product_id' => $subscription->items->data[0]->price->product,
                'stripe_price_id' => $subscription->items->data[0]->price->id,
                'user_id' => $authUser->id,
                'start_date' => Carbon::createFromTimestamp($subscription->current_period_start)->toDateTimeString(),
                'end_date' => Carbon::createFromTimestamp($subscription->current_period_end)->toDateTimeString(),
                'status' => $subscription->status,
                'cancel_at_period_end' => $subscription->cancel_at_period_end,
                'client_secret' => $subscription->latest_invoice->payment_intent->client_secret,
                'meta_data' => json_encode($subscription)
            ]);

            return response()->json(['subscription' => ['id' => $subscription->id,
                'client_secret' => $subscription->latest_invoice->payment_intent->client_secret,
                'status' => $subscription->status,
                'start_date' => Carbon::createFromTimestamp($subscription->current_period_start)->toDateTimeString(),
                'end_date' => Carbon::createFromTimestamp($subscription->current_period_end)->toDateTimeString()],
                'message' => 'Subscription created successfully']);


        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    protected function createStripeCustomer($authUser)
    {
        return Customer::create([
            'name' => $authUser->name,
            'email' => $authUser->email,
            //'payment_method' => $paymentMethodId ?? null,
            //'invoice_settings' => ['default_payment_method' => $paymentMethodId],
            'metadata' => [
                'store_id' => $authUser->id,
            ],

        ]);
    }

    public function paymentSucceeded(Request $request)
    {
        $store = Auth::user();
        if ($request->payment_intent) {
            $subscription = \App\Models\Subscription::where('store_id', $store->id)
                ->whereJsonContains('meta_data', ['payment_intent' => $request->payment_intent])->first();
            if ($subscription) {
                $subscription->update(['status' => 'active']);
                $store->has_active_subscription = 1;
                $store->save();

            }

            return response()->json(['message' => 'Paymnet succeeded']);

        }

    }

    protected function createSubscription($customerId, $priceId)
    {
        //check product or service exist for which subscription will be created

        return \Stripe\Subscription::create([
            'customer' => $customerId,
            'items' => [
                [
                    'price' => $priceId,
                ],
            ],
            'payment_behavior' => 'default_incomplete',
            'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
            'expand' => ['latest_invoice.payment_intent'],
            'metadata' => [
                'store_id' => Auth::user()->id,
                'email' => Auth::user()->email,
                'price_id' => $priceId,
            ]
        ]);

    }


    protected function createProductInStripe()
    {
        return Product::create([
            'name' => 'Platform charges',
            'type' => 'service',
            'description' => "Collect charges from Business user on monthly basis"
        ]);
    }

    protected function createProductPrice($productId)
    {
        $price = env('SUBSCRIPTION_PRICE');
        $currency = env('SUBSCRIPTION_CURRENCY');
        $price = $price ?? 7;
        $currency = $currency ?? 'usd';
        return Price::create([
            'product' => $productId,
            'unit_amount' => $price * 100, // The price in cents or smallest currency unit
            'currency' => $currency,
            'recurring' => [
                'interval' => 'month', // Interval can be 'day', 'week', 'month', or 'year'
            ],
        ]);

    }


}
