<?php


namespace Codebreaker;


class indexView
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
<form id="signin" action="post/index.php" method="POST">
    <fieldset>
        <p><img src="images/banner.png" width="521" height="346" alt="Codebreaker Banner"></p>
        <p>Welcome to Codebreaker!</p>
        <p><label for="name">Your Name: </label>
            <input type="text" name="name" id="name"></p>
        <p><input type="submit" value="Start Game"></p>
    </fieldset>
</form>
HTML;
        return $html;

    }
}