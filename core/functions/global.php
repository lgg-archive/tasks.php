<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 08.08.2015
 * Time: 10:08
 */
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
    $sort_col = array();
    foreach ((array)$arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
}

/**
 * @param $start <p>
 * Start date
 * </p>
 * @param $end <p>
 * End date
 * </p>
 * @return float number of days between two dates
 */
function date_difference($start, $end)
{
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}