<?php
function create_random($length)
{
    $data = 'Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Jj9KL0MmNnOoPpQqRrSsTtUu';
    $string = '';
    for($i = 0; $i < $length; $i++) {
        $pos = rand(0, strlen($data)-1);
        $string .= $data{$pos};
    }
    return $string;
}
$invoice = create_random(10);
?>