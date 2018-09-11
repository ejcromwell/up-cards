<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public $suit;
    public $value;


    public function __construct($suit, $value)
    {
        $this->suit  = $suit;
        $this->value = $value;
    }
}
