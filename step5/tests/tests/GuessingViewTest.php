<?php


class GuessingViewTest extends \PHPUnit\Framework\TestCase {
    const SEED = 1234;

    public function test_construct() {
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $this->assertInstanceOf('Guessing\GuessingView', $view);
    }

    public function test_game(){
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';

        $html .=<<<HTML
<p class="message">try to guess the number.</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $this->assertContains($html, $view->present());
    //correct
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">'.
            '<h1>Guessing Game</h1>';
        $guessing->guess(23);
        $num = $guessing->getNumGuesses();
        $html .=<<<HTML
<p class="message">After $num guesses you are correct</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html, $view->present());

        //TOO HIGH
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">'.
            '<h1>Guessing Game</h1>';
        $guessing->guess(90);
        $num = $guessing->getNumGuesses();
        $massage ="too high";
        $html .=<<<HTML
<p class="message">After $num guesses you are $massage</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html, $view->present());

        //TOO low
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">'.
            '<h1>Guessing Game</h1>';
        $guessing->guess(9);
        $num = $guessing->getNumGuesses();
        $massage ="too low";
        $html .=<<<HTML
<p class="message">After $num guesses you are $massage</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html, $view->present());
    }

    public function test_invalids(){

    }
}