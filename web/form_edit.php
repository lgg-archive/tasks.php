<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 10.08.2015
 * Time: 5:46
 */
?>
    <h2>
        <?php echo $LANG["edit"] ?>
    </h2>
<?php
foreach ($json_a as $item => $task) {
    if ($item == $taskid) {
        $found = 1;
        ?>

        <table class="striped">
            <tr>
                <th>
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
                        <input name="task" type="text" value="<?php echo $task["task"] ?>"></input>
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
                    <input name="duedate" type="text" value="<?php echo $task["duedate"] ?>"></input>
                </td>
                <td>
                    <input type="hidden" name="action" value="update"></input>
                    <input name="dateadded" type="hidden" value="<?php echo $task["dateadded"] ?>"></input>
                    <input type="hidden" name="id" value="<?php echo $item ?>"></input>
                    <input type="submit" name="submit" value="<?php echo $LANG["updatetask"] ?>"></input>
                    </form>
                </td>
            </tr>
        </table>

        <?php
    }
}
?>