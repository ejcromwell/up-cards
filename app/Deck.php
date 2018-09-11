<?php

namespace App;

use App\Card;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $deck_of_cards;


    /**
     * Build our deck of cards on class instance
     *
     **/
    public function __construct()
    {

        $card_suites = ['Clubs', 'Diamonds', 'Hearts', 'Spades'];
        $card_values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

        $this->deck_of_cards = $this->build_deck($card_suites, $card_values);

    }

    /**
     * Build a deck of cards using the Card object
     *
     * @return arr
     **/
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

    /**
     * Get the deck object array
     *
     * @return arr
     **/
    public function get_fresh_deck()
    {
        $output = $this->deck_of_cards;
        return $output;
    }


    /**
     * Shuffle the deck array.
     *
     * @return   arr
     **/
    public function shuffled_deck($deck_of_cards)
    {
        shuffle($deck_of_cards);
        return $deck_of_cards;
    }

    /**
     * Break up the deck of cards into there respective
     * suits.
     *
     * @return arr    nested asc array of card suits.
     **/
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

    /**
     * Move the ace from its sort position to the front of the array.
     *
     * Using the array position created by the sort function to
     * target the element in the array and move to begining of
     * array.
     *
     * @return obj
     **/
    private function reorder_ace($suit)
    {
        $ace = array_slice($suit, 9, 1);
        array_splice($suit, 9, 1);
        array_splice($suit, 0, 0, $ace);

        return $suit;

    }

    /**
     * Order the non numeric and non A cards in correct playing
     * card format.
     *
     * Using the array position created by the sort function to
     * target the element in the array and find position to
     * splice back into the array.
     *
     * @return arr
     **/
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

    /**
     * Combining and merging all filtered arrays back into a single
     * object array of Cards. Now in the same order as first created.
     *
     * @return arr
     **/
    public function order_deck($cards)
    {
        $suits = $this->get_suit($cards);

        $suits_ace = [];
        $suits_ace['Clubs']    = $this->reorder_ace($suits['Clubs']);
        $suits_ace['Diamonds'] = $this->reorder_ace($suits['Diamonds']);
        $suits_ace['Spades']   = $this->reorder_ace($suits['Spades']);
        $suits_ace['Hearts']   = $this->reorder_ace($suits['Hearts']);

        $suits_ordered = [];
        $suits_ordered['Clubs']    = $this->order_face_cards($suits_ace['Clubs']);
        $suits_ordered['Diamonds'] = $this->order_face_cards($suits_ace['Diamonds']);
        $suits_ordered['Spades']   = $this->order_face_cards($suits_ace['Spades']);
        $suits_ordered['Hearts']   = $this->order_face_cards($suits_ace['Hearts']);

        $output = array_merge($suits_ordered['Clubs'], $suits_ordered['Diamonds'], $suits_ordered['Spades'], $suits_ordered['Hearts']);

        return $output;
    }
}
