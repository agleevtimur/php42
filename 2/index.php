<?php
include("form.html");
$text = (string)$_REQUEST['text'];
function rephrase($item)
{
    $count = 0;
    for($i=0;$i < strlen($item);$i++) {
        if ($item[$i] == 'h') {
            $item[$i] = '4';
            $count++;
        }
        if ($item[$i] == 'i') {
            $item[$i] = '1';
            $count++;
        }
        if ($item[$i] == 'e') {
            $item[$i] = '3';
            $count++;
        }
        if ($item[$i] == 'o') {
            $item[$i] = '0';
            $count++;
        }
        yield $item[$i];
    }
    return $count;
}
$generator = rephrase($text);
foreach($generator as $val)
{
    echo $val;
}
echo "<br>"." return = ".$generator->getReturn();