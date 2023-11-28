<?php

namespace App\services;

use App\Models\Card;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\PngImageBackEnd;
use BaconQrCode\Writer;

class CardsService
{
    public function getCards($request = []){
        $query = Card::query();
        if($request['title'] != ''){
            $query->where('');
        }
        $cards = $query->get();
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
//        $code = $this->generate_code(8);
//        $this->generate_qr_image($code);
        $card = Card::create($data);
        return $card;
    }

    function generate_code($length): string
    {
        $code = array_merge(range(0, 9), range(0, 9));
        shuffle($code);
        return implode(array_slice($code, 0, $length));
    }

//    function generate_qr_image($number)
//    {
//        //        dd($number);
//        $renderer = new BaconQrCode\Renderer\ImageRenderer(
//            new BaconQrCode\Renderer\RendererStyle\RendererStyle(800),
//            new BaconQrCode\Renderer\Image\ImagickImageBackEnd()
//        );
//        dd($renderer);
//
////        $writer = new BaconQrCode\Writer($renderer);
//        $renderer = new ImageRenderer(400);
//        $renderer->setImageBackEnd(new PngImageBackEnd());
//        $writer = new Writer($renderer);
////        $writer->writeFile(route('qr_link', $number), public_path('files/qrcodes/') . $number . '.png');
//    }
}
