<?php

namespace App\Http\Controllers;

use App\Deck;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function index(Deck $deck)
    {
        $deck_of_cards   = $deck->get_fresh_deck();
        $shuffled_cards  = $deck->shuffle_deck($deck_of_cards);
        $reordered_cards = $deck->order_deck($shuffled_cards);

       return view('layouts.master', compact('deck_of_cards', 'shuffled_cards', 'reordered_cards'));

    }

    public function shuffle(Deck $deck)
    {
        $new_deck = $deck->get_fresh_deck();
        $data     = $deck->shuffle_deck($new_deck);
        $output   = $deck->buildJson($data);

        return $output;
    }
}
