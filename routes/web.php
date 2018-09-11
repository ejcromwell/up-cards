<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Deck;

Route::get('/', function () {

    $deck = new Deck();
    $deck_of_cards   = $deck->get_fresh_deck();
    $shuffled_cards  = $deck->shuffle_deck($deck_of_cards);
    $reordered_cards = $deck->order_deck($shuffled_cards);

   return view('layouts.master', compact('deck_of_cards', 'shuffled_cards', 'reordered_cards'));
});
