<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        /** @TODO */
        $this->computeTotal();
        if ($this->total < $price || $price < 0) {
            return false;
        }

        while ($price > 0) {
            $max_val = -9999;
            $max_index = -9999;
            for ($index = 0; $index < sizeof($this->wallet); $index += 1) {
                try {
                    $elem = $this->wallet[$index] + 0;
                    if (is_numeric($elem)) {
                        if ($elem > $max_val && $elem <= $price) {
                            $max_val = $elem;
                            $max_index  = $index;
                        }
                    }
                } catch (\Throwable $e) {
                    continue;
                }
            }

            $price -= $max_val;
            $copy1 = $this->wallet;
            $copy2 = $this->wallet;
            $len = sizeof($this->wallet);
            $this->wallet = array_merge(
                array_slice($copy1, 0, $max_index),
                array_slice($copy2, $max_index + 1, $len)
            );
        }

        $this->computeTotal();
        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_int($element)) {
                $this->total += $element;
            }
        }
    }
}
