<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        {{--        <fieldset class="grid grid-cols-2 gap-4">--}}
        {{--        <div style="display: flex; flex-wrap: wrap;">--}}

        <!--Business Name -->
        <div>
            <x-input-label for="business_name" :value="('Business Name')"/>
            <x-text-input id="business_name" class="block mt-1 w-full" type="text" name="business_name"
                          :value="old('business_name')" required autofocus autocomplete="business_name"/>
            <x-input-error :messages="$errors->get('business_name')" class="mt-2"/>
        </div>
        <!--Owner Name -->
        <div>
            <x-input-label for="owner_name" :value="('Owner Name')"/>
            <x-text-input id="owner_name" class="block mt-1 w-full" type="text" name="owner_name"
                          :value="old('owner_name')" required autofocus autocomplete="owner_name"/>
            <x-input-error :messages="$errors->get('owner_name')" class="mt-2"/>
        </div>
        <!--id_card_number -->
        <div>
            <x-input-label for="id_card_number" :value="__('id_card_number')"/>
            <x-text-input id="id_card_number" class="block mt-1 w-full" type="text" name="id_card_number"
                          :value="old('id_card_number')" required autofocus autocomplete="id_card_number"/>
            <x-input-error :messages="$errors->get('id_card_number')" class="mt-2"/>
        </div>
        <!-- id_card_number -->
        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')"/>
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                          :value="old('phone_number')" required autofocus autocomplete="phone_number"/>
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                          required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="country" :value="__('Country')"/>
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                          :value="old('country')" required autofocus autocomplete="country"/>
            <x-input-error :messages="$errors->get('country')" class="mt-2"/>
        </div>
        <div>
            <x-input-label for="city" :value="__('City')"/>
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                          required autofocus autocomplete="city"/>
            <x-input-error :messages="$errors->get('city')" class="mt-2"/>
        </div>
        <div>
            <x-input-label for="street" :value="__('City')"/>
            <x-text-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')"
                          required autofocus autocomplete="street"/>
            <x-input-error :messages="$errors->get('street')" class="mt-2"/>
        </div>

        {{--        </div>--}}
        {{--        </fieldset>--}}
        {{--        <div class="flex items-center justify-end mt-4">--}}
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        {{--        </div>--}}
    </form>
</x-guest-layout>
