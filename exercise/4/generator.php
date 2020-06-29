<?php
function generator($line, $weights) {
    if (count($line) == 0 || count($weights) == 0 || count($line) != count($weights))
        return false;
    $data = array_combine($line, modify($weights));
    $rand = mt_rand(0, array_sum($weights));
    // this is analogue of counting probability
    foreach ($data as $key => $value){
        if($rand == $value and end($data) != $value) // last interval must conclude last value (example [0,1) [1,3) and [3,9]
            continue;
        if($rand <= $value)
        { // rand is around this interval - so its line is result
            yield $key;
            break;
        }
    }
    $json = json_encode(cus_serialize($data, test($data)), JSON_UNESCAPED_UNICODE); //tested generator to json
    echo "<p>" . $json . "</p>";
}
// creating analogue of intervals: from arr[0] to arr[1]; from arr[1] to arr[2] ...
function modify(array $arr) : array { // difference between intervals is its weight;
    $delta = 0;
    foreach ($arr as &$item){
        $item += $delta;
        $delta = $item;
    }
    return $arr;
}
function test(array $arr): array {
    $count = array_fill_keys(array_keys($arr), 0);
    //$count = array_fill(0, count($arr), 0);
    var_dump($arr);
    for($i = 0; $i < 10000; $i++){
        $rand = mt_rand(0, $arr[array_key_last($arr)]);

        foreach ($arr as $key => $value){
            if($rand == $value and end($arr) != $value) { // last interval must conclude last value (example [0,1) [1,3) and [3,9]
                continue;
            }
            if($rand <= $value) { // rand is around this interval - so its line is result
                $count[$key]++;
                break;
            }
        }
    }
    return $count;
}
function cus_serialize($arr, $count) { //preparing to be serialized to json
    $output = [];
    foreach($arr as $line => $weight){
        array_push($output,["text" => $line,
                "count" => $count[$line],
                "calculated_probability" => round($count[$line]/10000, 2)]);
    }
    return $output;
}

