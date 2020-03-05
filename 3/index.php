<?php
include("form.html");
if (isset($_REQUEST['input'])) {
    $input = explode(PHP_EOL, $_REQUEST['input']);
    $shuffleInput = array_slice($input, 0); //clone arr
    //shuffling cloned arr
    foreach ($shuffleInput as &$item) {
        $explodeItem = explode(' ',$item);
        shuffle($explodeItem);
        $item = implode(' ', $explodeItem);
    }

    $result = array_merge($input, $shuffleInput);
    uksort($result, function ($r1, $r2) {
        if (isset($r1[1]) && isset($r2[1]))
            return strcmp($r1[1], $r2[1]);// comparing by 2nd words
        else return 0;
    });

    foreach ($result as $out) {
        echo "<br>" . $out;
    }

}
