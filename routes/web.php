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
    $deck_of_cards = $deck->ordered_deck();
    $shuffled_cards = $deck->shuffled_deck();
    //return view('welcome', compact('card_suites', 'card_values', 'deck_of_cards'));
    return view('welcome', compact('deck_of_cards', 'shuffled_cards'));
});
