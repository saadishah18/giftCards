<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\services\CardsService;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public $service;

    public function __construct(CardsService $cardsService)
    {
        $this->service = $cardsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cards = $this->service->getCards();
            return view('pages.cards.index',compact('cards'));
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $card = $this->service->store($request);
            if($card){
                return redirect()->route('cards.index')->with('success' ,'Card created successfully');
            }
        }catch (\Exception $exception){
            dd($exception->getMessage());
            return redirect()->back()->with('error' ,$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
