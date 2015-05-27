<?php

class Bowling
{

    private $rolls = [];

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $ball = 0;
        $score = 0;
        for ($frame = 0; $frame < 10; $frame ++) {
            if ($this->isSpare($ball)) {
                $score += $this->spareBonus($ball);
                $ball += 2;
            } elseif ($this->isStrike($ball)) {
                $score += $this->bonusStrike($ball);
                $ball ++;
            } else {
                $score += $this->rolls[$ball] + $this->rolls[$ball + 1];
                $ball +=2;
            }
        }

        return $score;
    }

    /**
     * @param $ball
     * @return bool
     */
    private function isSpare($ball)
    {
        return 10 === $this->rolls[$ball] + $this->rolls[$ball + 1];
    }

    /**
     * @param $ball
     * @return int
     */
    private function spareBonus($ball)
    {
        return 10 + $this->rolls[$ball + 2];
    }

    /**
     * @param $ball
     * @return mixed
     */
    private function bonusStrike($ball)
    {
        return $this->rolls[$ball] + $this->rolls[$ball + 1] + $this->rolls[$ball + 2];
    }

    /**
     * @param $ball
     * @return bool
     */
    private function isStrike($ball)
    {
        return 10 === $this->rolls[$ball];
    }
}
