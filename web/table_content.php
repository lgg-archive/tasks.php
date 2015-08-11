<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 10.08.2015
 * Time: 2:59
 */
?>
<tr <?php echo getrowstyle($rowstyle,$task["priority"]) ?>>
    <td>
        <?php
        switch ($task["priority"]) {
            case 1:
                echo $LANG["high"];
                break;
            case 2:
                echo $LANG["normal"];
                break;
            case 3:
                echo $LANG["low"];
                break;
            case 4:
                echo $LANG["onhold"];
                break;
        }
        ?>
    </td>
    <td>
        <?php echo $task['task'] ?>
    </td>
    <td>
        <?php
        $dayopen = NULL;
        if ($taskstatus == "open") {
            $dayopen = date_difference($task["dateadded"], $dateformat);
        }
        if ($taskstatus == "closed" || $taskstatus == "deleted") {
            //Validate date
            if (preg_match('/([0-9]{2}-[0-9]{2}-[0-9]{4})/', $task["donedate"])) {
                $dayopen = date_difference($task["dateadded"], $task["donedate"]);
            } else {
                $dayopen = "-";
            }
        }
        echo $dayopen;
        ?>
    </td>
    <td>
        <?php
            include("table_daystoclose.php");
        ?>
    </td>
    <td>
        <?php
        switch ($taskstatus) {
            case 'open':
                include("actions_open.php");
                break;
            case 'deleted':
                include("actions_deleted.php");
                break;
            case 'closed':
                include("actions_closed.php");
                break;
        }
        ?>
    </td>
</tr>
