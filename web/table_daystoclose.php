<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 10.08.2015
 * Time: 7:35
 */
$duedate = $task["duedate"];
if ($duedate == '-') {
    echo "-";
} else {
    //Validate date
    if (preg_match('/([0-9]{2}-[0-9]{2}-[0-9]{4})/', $duedate)) {
        if ($taskstatus == "closed" || $taskstatus == "deleted") {
            echo $duedate;
        } else {
            $daystoclose = date_difference($dateformat, $duedate);
            if ($daystoclose < 0) { ?>
                <u>
                    <?php echo abs($daystoclose) . $LANG["dayslate"] ?>
                    (<?php echo getduedate($duedate, $LANG) ?>)
                </u>

            <?php
            } elseif ($daystoclose == 0) { ?>
                <b>
                    <?php echo $LANG["today"] ?>
                    (<?php echo getduedate($duedate, $LANG) ?>)
                </b>

            <?php
            } else { ?>
                <?php echo $daystoclose . $LANG["daysleft"] ?>
                (<?php echo getduedate($duedate, $LANG) ?>)

            <?php
            }
        }
    }
}
?>