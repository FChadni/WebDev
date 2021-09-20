<?php


namespace Guessing;


class GuessingController
{
    public function __construct(Guessing $guess, $post) {
        $this->guessing = $guess;
        if(isset($post['value'])){
            $this->guessing->guess(strip_tags($post['value']));
        }
        else if(isset($post['clear'])){
            $this->reset = true;
        }
    }


    public function isReset() {
        return $this->reset;
    }

    private $guessing;                // The Guessing object we are controlling
    private $reset = false;

}