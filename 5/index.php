<?php
include "form.html";
if (isset($_REQUEST['password'])){
    $password = $_REQUEST['password'];
    $flag = true;
    if (strlen($password) < 10) {
        echo "<br>" . "password is too short!";
        $flag = false;
    }

    if (!preg_match("/(?=(.*[[:digit:]].*){2,})(?=(.*[[:lower:]].*){2,})(?=(.*[[:upper:]].*){2,})(?=(.*[\\%\\$\\#\\_\\*].*){2,})/", $password)) {
        echo "<br>" . "password must have 2 or more symbols of each category:" .
            "<br>" . "Latin capital letters Latin lowercase letters numbers; characters % $ # _ *";
        $flag = false;
    }

    if (preg_match("/[[:digit:]]{4,}|[[:lower:]]{4,}|[[:upper:]]{4,}|[\\%\\$\\#\\_\\*]{4,}/", $password)) {
        echo "<br>" . "Password does not contain more than 3 characters of any category in a row";
        $flag = false;
    }
    if ($flag)
        echo "<br>" . "success";

}