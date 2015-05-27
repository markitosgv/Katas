<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingSpec extends ObjectBehavior
{

    function it_should_score_all_gutters()
    {
        $this->rollMany(20, 0);

        $this->score()->shouldBe(0);
    }

    function it_should_score_all_ones()
    {
        $this->rollMany(20, 1);

        $this->score()->shouldBe(20);
    }

    function it_should_score_a_spare()
    {
        $this->rollSpare();
        $this->roll(3);
        $this->rollMany(17, 0);

        $this->score()->shouldBe(16);
    }

    function it_should_score_a_strike()
    {
        $this->rollStrike();
        $this->roll(3);
        $this->roll(5);
        $this->rollMany(16, 0);

        $this->score()->shouldBe(26);
    }

    function it_should_score_a_perfect_game()
    {
        $this->rollMany(20, 10);

        $this->score()->shouldBe(300);
    }

    private function rollMany($count, $pins)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->roll($pins);
        }
    }

    private function rollSpare()
    {
        $this->roll(5);
        $this->roll(5);
    }

    private function rollStrike()
    {
        $this->roll(10);
    }

}