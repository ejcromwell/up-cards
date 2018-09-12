<?php

namespace App\Http\Controllers;

use App\Deck;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function index(Deck $deck)
    {
        $new_deck = $deck->get_fresh_deck();
        $data     = $deck->shuffle_deck($new_deck);
        $output   = $deck->buildJson($data);

        return $output;
    }
}
