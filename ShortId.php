<?php

namespace kotchuprik\short_id;

class ShortId
{
    protected $alphabet;

    public function __construct($alphabet = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $this->alphabet = $alphabet;
    }

    public function encode($input, $neededLength = 0)
    {
        $output = '';
        $base = strlen($this->alphabet);
        if (is_numeric($neededLength)) {
            $neededLength--;
            if ($neededLength > 0) {
                $input += pow($base, $neededLength);
            }
        }
        for ($current = ($input != 0 ? floor(log($input, $base)) : 0); $current >= 0; $current--) {
            $powed = pow($base, $current);
            $floored = floor($input / $powed) % $base;
            $output = $output . substr($this->alphabet, $floored, 1);
            $input = $input - ($floored * $powed);
        }

        return $output;
    }

    public function decode($input, $neededLength = 0)
    {
        $output = 0;
        $base = strlen($this->alphabet);
        $length = strlen($input) - 1;
        for ($current = $length; $current >= 0; $current--) {
            $powed = pow($base, $length - $current);
            $output = ($output + strpos($this->alphabet, substr($input, $current, 1)) * $powed);
        }
        if (is_numeric($neededLength)) {
            $neededLength--;
            if ($neededLength > 0) {
                $output -= pow($base, $neededLength);
            }
        }

        return $output;
    }
}
