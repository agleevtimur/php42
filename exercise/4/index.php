<?php
include("form.html");
include("generator.php");
if(isset($_REQUEST["input"]))
{
    $text = $_REQUEST["input"];
    $lines = explode(PHP_EOL, $text); // list of input lines
    $weight_list = [];
    $is_correct = true;
    foreach ($lines as &$line)
    {
        $newLine = [];
        array_push($newLine, ...explode(' ', $line));
        $weight = array_pop($newLine);
        // checking if last symbol is numeric
        if (is_numeric($weight)) array_push($weight_list, $weight);
        else {
            $is_correct = false;
            break;
        }
        $line = implode(' ',$newLine);// rewrite line without its weight
    }

    if ($is_correct) {
        $sum_weight = array_sum($weight_list);
        // preparing result array for being serialized
        $line_data = array_merge(["sum" => $sum_weight], ["data" => []]);
        for($i = 0; $i < count($lines); $i++ ){
            array_push($line_data["data"],
                ["text" => $lines[$i],
                    "weight" => $weight_list[$i],
                    "probability" => round($weight_list[$i]/$sum_weight, 2)
                ]);
        }
        $json = json_encode($line_data, JSON_UNESCAPED_UNICODE);
        echo "<p>" . $json . "</p>";
        echo "<b>";

        $out = generator($lines, $weight_list); // getting line by its probability through generator
        foreach ($out as $item) {
            echo "<p> output: " . $item . "</p>";
        }
    }
    else {
        echo "<p>" . "Invalid input!" . "</p>";
        echo "<p>" . "Last symbol of each line should be a number" . "</p>";
    }
}
