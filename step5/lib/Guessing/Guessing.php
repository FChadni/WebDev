<?php


namespace Guessing;


class Guessing
{
    const MIN = 1;
    const MAX = 100;
    const TOOLOW = 1;
    const CORRECT = 0;
    const TOOHIGH = 2;
    const INVALID = 3;

    public function __construct($seed = null) {
        if($seed === null) {
            $seed = time();
        }

        srand($seed);
        $this->number = rand(self::MIN, self::MAX);
    }

    public function getNumber(){
        return $this->number;
    }
    public function getGuess(){
        return $this->gues;
    }
    public function getNumGuesses(){
        return $this->numGuesses;
    }

    public function guess($n){
        $this->gues = $n;
        if($this->check() != Self::INVALID){
            $this->numGuesses++;
        }
    }

    public function check(){
        $guess = $this->gues;
        if (!is_numeric($guess) && $guess < self::MIN || $guess > self::MAX) {
            return self::INVALID;
        } elseif ($guess < $this->number) {
            return self::TOOLOW;
        } elseif ($guess > $this->number) {
            return self::TOOHIGH;
        } elseif ($guess == $this->number){
            return self::CORRECT;
        }
    }


    private $number;
    private $numGuesses = 0;
    private $gues = 1;

}