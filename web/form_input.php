<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 08.08.2015
 * Time: 11:49
 */

?>
<table class="striped">
    <tr>
        <th class="center">
            <?php echo $LANG["task"] ?>
        </th>
        <th>
            <?php echo $LANG["priority"] ?>
        </th>
        <th>
            <?php echo $LANG["duedate"] ?>
        </th>
        <th>

        </th>
    </tr>
    <tr>
        <td>
            <form name="edit" action="action.php" method="GET">
            <input name="task" size=40 type="text" placeholder="<?php echo $LANG["tasktodo"] ?>"></input>
        </td>
        <td>
            <select name="prio">
                <option value="2">
                    <?php echo $LANG["normal"] ?>
                </option>
                <option value="1">
                    <?php echo $LANG["high"] ?>
                </option>
                <option value="3">
                    <?php echo $LANG["low"] ?>
                </option>
                <option value="4">
                    <?php echo $LANG["onhold"] ?>
                </option>
            </select>
        </td>
        <td>
            <input name="duedate" type="text" value="<?php echo $dateformat ?>"></input>
        </td>
        <td>
            <input type="hidden" name="action" value="add"></input>
            <input name="dateadded" type="hidden" value="<?php echo $dateformat ?>"></input>
            <input type="submit" name="submit" value="<?php echo $LANG["addtask"] ?>"></input>
            </form>
        </td>
    </tr>
</table>