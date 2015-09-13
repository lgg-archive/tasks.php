<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Date: 08.08.2015
 * Time: 6:59
 */
//User
$login = "admin";
$pass = "123";

//App settings
$projectname = "Tasks"; //Project Name
$projectdesc = ""; //Project Description
$filename = "task.json"; //task filename(must be .json)
$rowstyle = "priority"; //striped or priority

$projectversion = "v0.2"; //Project ver
$dateformat = date('d-m-Y'); //Date format

//Need auth?
$auth = true; //need auth?

//With ajax?
$ajax = true;

//Errors
error_reporting(0);
?>