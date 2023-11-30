<?php

namespace App\services;

use App\Models\Card;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
class CardsService
{
    public function getCards($request = []){
        $query = Card::query();
        if(auth()->user()->role !='admin'){
            $query->where('user_id',auth()->id());
        }

        if(!empty($request) && $request['title'] != ''){
            $query->where('title','like','%'.$request['title']);
        }
        if(!empty($request) && $request['business_name'] != ''){
            $query->where('business_name','like', '%'.$request['business_name']);
        }
        if(!empty($request) && $request['city'] != ''){
            $query->wherHas('user',function ($q) use($request){
               $q->where('city',$request['city']);
            });
        }
        if(!empty($request) && $request['country'] != ''){
            $query->wherHas('user',function ($q) use($request){
               $q->where('country',$request['country']);
            });
        }
        if(!empty($request) && $request['address'] != ''){
            $query->wherHas('user',function ($q) use($request){
               $q->where('address',$request['address']);
            });
        }
        $cards = $query->with('user')->get();
//        dd($cards);
        return $cards;
    }

    public function store($request){
        $data = $request->all();
        if(isset($request['display_title'])){
            $data['display_title'] = 1;
        }else{
            $data['display_title'] = 0;
        }
        if(isset($request['display_business'])){
            $data['display_business'] = 1;
        }else{
            $data['display_business'] = 0;
        }
        if(isset($request['display_price'])){
            $data['display_price'] = 1;
        }else{
            $data['display_price'] = 0;
        }
        $data['user_id'] = auth()->id();
        $code = $this->generate_code(8);
        $qr_code = $this->generate_qr_image($code);
        $data['qr_code'] = $qr_code;
        $card = Card::create($data);
        return $card;
    }

    function generate_code($length): string
    {
        $code = array_merge(range(0, 9), range(0, 9));
        shuffle($code);
        return implode(array_slice($code, 0, $length));
    }

    function generate_qr_image($number)
    {
        $filename = $number . '.png';
        $folderPath = 'uploads/qr-codes';

        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $filePath = $folderPath . '/' . $filename;

        $renderer = new ImageRenderer(
            new RendererStyle(200),
//            new ImagickImageBackEnd()
            new ImagickImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrImage = $writer->writeString($number);

        file_put_contents($filePath, $qrImage);

        $imageUrl = asset('/' . $filePath);
        return $imageUrl;
    }
}
