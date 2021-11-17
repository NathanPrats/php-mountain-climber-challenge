<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        /* TODO */

        // starting string
        $palindrome = $this->str;

        $len = strlen($this->str);
        for ($index = $len - 1; $index >= 0; $index -= 1) {
            $char_unicode = utf8_decode($this->str[$index]);
            $palindrome .= $char_unicode;
        }
        return $palindrome;
    }

}
