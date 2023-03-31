<?php

// part a
$str = 'ahb acb aeb aeeb adcb axeb';
preg_match_all('/a..b/', $str, $matches);
print_r($matches[0]);

// part b

$s = 'a1b2c3';
$s = preg_replace_callback('/\d+/', function($match) {
    return pow($match[0], 3);
}, $s);
echo $s;
