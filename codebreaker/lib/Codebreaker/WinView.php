<?php


namespace Codebreaker;


class WinView
{
    /**
     * Constructor
     * @param Codebreaker $codebreaker The Codebreaker object
     */
    public function __construct(Codebreaker $codebreaker) {
        $this->codebreaker = $codebreaker;
    }

    public function getCodebreaker(){
        return $this->codebreaker;
    }

    public function naem(){
        $html = '';
        $html .= "<h1>< $codebreaker->getUser()'s Codebreaker</h1>";
        return $html;
    }

    public function present(){
        $html = '';
        $html .= <<<HTML
<form id="gameform" action="post/codebreaker.php" method="POST">
    <fieldset>
        <h1>$codebreaker->getUser()'s Codebreaker</h1>
        <h2>Encoded:</h2>
        <p class="code">$codebreaker->getEncoded()</p>
        <h2>Decoded:</h2>
        <p class="code">$codebreaker->getPlaintext()</p>

        <table class="game">
            <p class="end">You decoded the secret message! </p>
            <p>
                <input type="submit" name="newgame" value="New Game">
            </p>
        </table>
    </fieldset>
</form>
HTML;
        return $html;

    }

}