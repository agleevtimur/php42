<?php
include('index.html');
ini_set('max_execution_time', 400);
function show_ping($url) {
  echo 'pinging...</br>';
  $command = 'ping '. $url;
  $output = [];
  exec($command, $output);
  $ip_pos_st = strpos($output[1],'['); 
  $ip_pos_end = strpos($output[1],']');
  $ip = substr($output[1], $ip_pos_st + 1, $ip_pos_end - $ip_pos_st - 1); // get ip
  echo '<b>' . $ip . '</b></br>';
  $count = 100 - intval(substr($output[8], 1, 1));
  echo $count . '% packets were sent successful</br></br>';
}

function show_tracert($url) {
  echo 'tracing route...</br>';
  $command = 'tracert '. $url;
  $output = [];
  exec($command, $output);
  for ($i = 4; $i < count($output) - 2; $i++) {
    $reg_match = '/^([0-9]{1,3}[\.]){3}[0-9]{1,3}$/'; 
    $temp = explode(' ', $output[$i]);
    $ip = array_pop($temp);
    if ($i == count($output) - 3)
    {
      $ip = trim($ip,'[]'); // triming last ip
    }
      
    if (preg_match($reg_match, $ip)) echo $ip . ' '; // check valid ip
    else echo "[time is over] ";
  }
  echo '- target';
}

function render($value,$url) {
  switch ($value) {
    case 'ping':
      show_ping($url);
      break;
    case 'tracert':
      show_tracert($url);
    break;
    
    default:
      # code...
      break;
  }
}

if (isset($_REQUEST['url']) and isset($_REQUEST['check-connection'])) {
  $url = $_REQUEST['url'];
  $reg_match = "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,10})([\/\w \.-]*)*\/?$/";
  if (preg_match($reg_match, $url)) {
    foreach ($_REQUEST['check-connection'] as $key => $value) {
      render($value, $url);
    }
  } else echo '<br> invalid url address';
} else echo '<br> missing something in form';
?>
