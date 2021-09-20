<?php


namespace Codebreaker;


class loseView
{
    /**
     * Constructor
     * @param Codebreaker $codebreaker The Codebreaker object
     */
    public function __construct(Codebreaker $codebreaker) {
        $this->codebreaker = $codebreaker;
    }

    public function present(){
        $html = '';
        $html .= <<<HTML

HTML;
        return $html;

    }

}