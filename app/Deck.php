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
        $card_values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

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

    public function get_fresh_deck()
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


    private function get_suit($cards)
    {
        $output = [];


        $output['Clubs'] = array_filter($cards, function($a) {
            if ($a->suit === 'Clubs') {
                return $a;
            }
        });

        $output['Diamonds'] = array_filter($cards, function($a) {
            if ($a->suit === 'Diamonds') {
                return $a;
            }
        });

        $output['Spades'] = array_filter($cards, function($a) {
            if ($a->suit === 'Spades') {
                return $a;
            }
        });

        $output['Hearts'] = array_filter($cards, function($a) {
            if ($a->suit === 'Hearts') {
                return $a;
            }
        });

        sort($output['Clubs']);
        sort($output['Diamonds']);
        sort($output['Spades']);
        sort($output['Hearts']);

        return $output;
    }

    private function reorder_ace($suit)
    {
        $ace = array_slice($suit, 9, 1);
        array_splice($suit, 9, 1);
        array_splice($suit, 0, 0, $ace);

        return $suit;

    }

    private function order_face_cards($suit)
    {

        $face_cards = [];

        $face_cards[0] = array_slice($suit, 10, 1);
        $face_cards[2] = array_slice($suit, 11, 1);
        $face_cards[1] = array_slice($suit, 12, 1);

        ksort($face_cards);

        $face_cards_clean = array_map(function($a) {
            return $a[0];
        }, $face_cards);


        array_splice($suit, 10, 3, $face_cards_clean);

        return $suit;

    }

    public function order_deck($cards)
    {
        $suits = $this->get_suit($cards);

        $suits_ace = [];
        $suits_ace['Clubs'] = $this->reorder_ace($suits['Clubs']);
        $suits_ace['Diamonds'] = $this->reorder_ace($suits['Diamonds']);
        $suits_ace['Spades'] = $this->reorder_ace($suits['Spades']);
        $suits_ace['Hearts'] = $this->reorder_ace($suits['Hearts']);

        $suits_ordered = [];
        $suits_ordered['Clubs'] = $this->order_face_cards($suits_ace['Clubs']);
        $suits_ordered['Diamonds'] = $this->order_face_cards($suits_ace['Diamonds']);
        $suits_ordered['Spades'] = $this->order_face_cards($suits_ace['Spades']);
        $suits_ordered['Hearts'] = $this->order_face_cards($suits_ace['Hearts']);

        $output = array_merge($suits_ordered['Clubs'], $suits_ordered['Diamonds'], $suits_ordered['Spades'], $suits_ordered['Hearts']);

        return $output;
    }
}
