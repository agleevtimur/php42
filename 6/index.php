<?php
$ini_file = parse_ini_file('index.ini', true,INI_SCANNER_NORMAL);
$message = '<br>'; // log message
if ($ini_file) {
    $text_file = array_shift($ini_file)['filename']; //get origin file
    $temp_file = file($text_file); // clone file by lines\
    if ($temp_file) {
        foreach ($temp_file as &$line)
            foreach ($ini_file as $item) {
                $rule_number = $item['symbol'];
                if (isset($rule_number) and strpos($line, $rule_number) === 0 ) { // rule_number exists and line starts with it
                    $line = apply_rule_to_line(next($item),key($item), substr($line,3));
                    // 1st arg - value of rule parameter, 2nd - rule parameter, 3 - line without rule number
                    break;
                }
            }
        unset($line);
        $desc = fopen($text_file,'w');
        if ($desc) {
            foreach ($temp_file as $line)
                fwrite($desc, $line );
            if (fclose($desc))  $message .= 'Success! <br> Check index.txt';
            else $message .= 'Fail to close!';
        }
        else $message .= 'Fail to open!';
    }
    else $message .= 'Fail to clone file!';
}
else $message .= 'Fail to parse ini!';
echo $message;

function apply_rule_to_line($value, $rule, $line) {
    switch ($rule) {
        case 'upper':
            if ($value) return strtoupper($line);
            else return strtolower($line);
        case 'direction':
            $direction = array_fill(0,strlen($line), $value); // to use as a 2nd argument in map
            // we need to convert string to array to use map
            return implode('',array_map('apply_direction',str_split($line), $direction));
        case 'delete':
            return str_replace($value, '', $line);
    }
};

function apply_direction($item, $action) {
    $res = $item;
    if (is_numeric($res)) {
        if ($action === '+')
            if ($res == 9) $res = 0;
            else $res++;
        elseif ($action === '-')
            if ($res == 0) $res = 9;
            else $res--;
    }
    return (string)$res;
}
