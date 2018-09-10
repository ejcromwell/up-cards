<?php

namespace App;

use App\Card;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $deck_of_cards;


    public function __construct()
    {

        $card_suites = ['Clubs', 'Diamonds', 'Hearts', 'Spades'];
        $card_values = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];

        $this->deck_of_cards = $this->build_deck($card_suites, $card_values);

    }

    private function build_deck($suits, $values)
    {

        $output = [];
        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $output[] = new Card($suit, $value);
            }
        }

        return $output;
    }

    public function ordered_deck()
    {
        $output = $this->deck_of_cards;
        return $output;
    }


    public function shuffled_deck()
    {
        $shuffled_deck = $this->deck_of_cards;
        shuffle($shuffled_deck);
        $output = $shuffled_deck;
        return $output;
    }
}
