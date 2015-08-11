<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 08.08.2015
 * Time: 10:10
 */


function parselang()
{
    $langdir = realpath(__DIR__ . "/../../lang") . DIRECTORY_SEPARATOR;
    $langfile = $langdir . "lang.json";
    $langfile = file_get_contents($langfile);
    $lang = json_decode($langfile, true);
    $lfile = $langdir . 'language.' . $lang["lang"] . '.php';
    return (file_exists($lfile)) ? $lfile : $langdir . 'language.en.php';
}

function changelang($lang)
{
    $langdir = realpath(__DIR__ . "/../../lang/") . DIRECTORY_SEPARATOR;
    $lfile = $langdir . 'language.' . $lang . '.php';
    if (file_exists($lfile)) {
        $langjson["lang"] = $lang;
        $langjson = json_encode($langjson);
        if (file_put_contents($langdir . 'lang.json', $langjson, LOCK_EX)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getduedate($duedate, $LANG)
{
    $duedate = strtotime($duedate);
    if ($LANG["name"] == "ru") {
        return $LANG["days"][date('N', $duedate)] . " "
        . date('d', $duedate) . " "
        . $LANG["months"][date('n', $duedate)];
    } else {
        return date('D d M', $duedate);
    }
}