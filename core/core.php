<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Date: 08.08.2015
 * Time: 10:00
 */
//Loading data
require_once("data.php");

//Loading all functions
require_once("functions.php");

//Loading language
require_once(parselang());

//Full path to task file
$file = __DIR__ . DIRECTORY_SEPARATOR . $filename;

//Loading tasks
$jsonfile = file_get_contents($file);
$json_b = json_decode($jsonfile, true);
$json_a = $json_b["tasks"];

//Some default vars
$closed = 0;
$havetasks = 0;

//Auth
if ($auth) {
    session_start();
    $allow_access = isloggedin();
} else {
    $allow_access = true;
}
?>