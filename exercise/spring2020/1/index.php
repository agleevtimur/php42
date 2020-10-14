<?php
include("form.html");
$inputCommands = (string)$_REQUEST['input'];
$data = (string)$_REQUEST['data'];
$memory = array(0);
$checkPoint = 0;
$pointer = 0;
for($i=0; $i<strlen($inputCommands); ++$i) {
    switch($inputCommands[$i]) {
        case "+" : // увеличиваем значение текущей ячейки
            $memory[$pointer]++;
            break;
        case "-" :
            // уменьшаем значение текущей ячейки
            $memory[$pointer]--;
            break;
        case "." :
            // выводим символ
             $result .=chr($memory[$pointer]);
            break;
        case "," : // считываем извне в память
            $memory[$pointer] = ord($data[$pointer]);
            break;
        case ">" : // переход к следующей ячейке
            $pointer++;
            if(!isset($memory[$pointer])) {
                $memory[$pointer] = 0;
            }
            break;
        case "<" : // переход к предыдущей ячейке
            $pointer--;
            if(!isset($memory[$pointer])) {
                $memory[$pointer] = 0;
            }
            break;
        case "[" : // возвращаемся в начало
            if(!$memory[$pointer]) {
                $checkPoint = 1;
                while($checkPoint) { //идем вперед до "[" с учетом вложенности
                    $i++;
                    if($inputCommands[$i] == "[") {
                        $checkPoint++;
                    } else if($inputCommands[$i] == "]") {
                        $checkPoint--;
                    }
                }
            }
            break;
        case "]" : // переходим в конец
            if($memory[$pointer]) {
                $checkPoint = 1;
                while($checkPoint) {
                    $i--; // идем назад до "[" с учетом вложенности
                    if($inputCommands[$i] == "]") {
                        $checkPoint++;
                    } else if($inputCommands[$i] == "[") {
                        $checkPoint--;
                    }
                }
            }
            break;
    }
}
echo "<p>" . $result . "</p>";