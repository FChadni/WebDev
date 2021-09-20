<?php


class GuessingControllerTest extends \PHPUnit\Framework\TestCase{
    const SEED = 1234;

    public function test_reset() {
        $guessing = new Guessing\Guessing(self::SEED);
        $controller = new Controller($guessing, array('value' => 12));
        $this->assertFalse($controller->isReset());

        $guessing = new Guessing(self::SEED);
        $controller = new Controller($guessing, array('clear' => 'New Game'));
        $this->assertTrue($controller->isReset());

        if(isset($post['clear'])) {
            $this->reset = true;
        }
    }

}