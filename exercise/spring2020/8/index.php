<?php
function custom_offset($offset, &$container, $index) {
  while($offset){
    array_push($container[$index], '&nbsp;');
    $offset--;
  }
}

$flag = false;
$months = ['Январь',
'Февраль',
'Март',
'Апрель',
'Май',
'Июнь',
'Июль',
'Август',
'Сентябрь',
'Октябрь',
'Ноябрь',
'Декабрь'
];

include("index.html");
$current_month = $_REQUEST['month'];

if ($current_month == 0) { //default
  $flag = true;
  $current_month = date('n'); //using current datetime
}
$start_date = new DateTime(date('y-m-d', mktime(0,0,0, $current_month , 1, date('y'))));
$end_date =(clone $start_date)->modify('next month');

$month_period = new DatePeriod($start_date, new DateInterval('P1D'), $end_date);

$container = [[]];
//pushing gaps for first week into container
custom_offset($start_date->format('N') - 1, $container, 0);
$count = 0;
//pushing datetime values into container
foreach($month_period as $day) {
  //weekend
  if ($day->format('N') >= 6) $input = '<font color=red>'.$day->format('j').'</font>';
  else $input = $day->format('j');
  if ($flag && $day->format('j')==date('j')) $input = '<strong>'.$input.'</strong>';
  array_push($container[$count], $input);
  if (count($container[$count]) % 7 == 0) {
    $count++;
    $container[$count] = [];
  }
}
//if next month starts in Monday - skip empty row
$last_week_offset = $end_date->format('N') == 1? 0 : 7 - $end_date->format('N')+1; 
//pushing gaps for last week
custom_offset($last_week_offset, $container, $count);
//makeing table
echo '<table border=1 class="form-result">';
echo '<caption>'.$months[$current_month-1].'</caption>';
echo '<tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr>';
foreach($container as $week) {
  echo '<tr>';
  foreach($week as $day) {
    echo '<td>'.$day.'</td>';
  }
  echo '</tr>';
}
echo '</table>';
?>