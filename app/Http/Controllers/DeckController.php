<?php

namespace App\Http\Controllers;

use App\Deck;
use Illuminate\Http\Request;

class DeckController extends Controller
{
    public function index(Deck $deck)
    {
        $new_deck = $deck->get_fresh_deck();
        $data = $deck->shuffle_deck($new_deck);
        foreach ($data as $item) {
            $list[] = ['suit' => $item->suit, 'value' => $item->value];
        }
        $output = json_encode($list);
        return $output;
    }
}
