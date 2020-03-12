<?php
include("form.html");
if (isset($_REQUEST['input'])) {
    $input = array_map(function ($item) {
        return explode(' ', $item);
    }, explode(PHP_EOL, $_REQUEST['input'])); //breaking down into [[]]

    $clone_arr = array_slice($input, 0); //clone arr

    array_walk($clone_arr, function (&$item) {
        shuffle($item); //shuffling cloned arr
    });

    $result = array_merge($input, $clone_arr);
    uasort($result, function ($r1, $r2) {
        if (isset($r1[1]) && isset($r2[1]))
            return strcmp($r1[1], $r2[1]);// comparing by 2nd words
        else return 0;
    });

    $result = array_map(function ($item) {
        return implode(' ', $item); // pack into string
    }, $result);
    foreach ($result as $out)
        echo "<br>" . $out;
}
