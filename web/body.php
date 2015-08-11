<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 08.08.2015
 * Time: 12:18
 */
?>
        <ul class="tabs left">
            <li>
                <a href="#maintab">
                    <?php echo $LANG["tasks"] ?>
                </a>
            </li>
            <li>
                <a href="#finishedtab">
                    <?php echo $LANG["finishedtasks"] ?>
                </a>
            </li>
            <li>
                <a href="#trashtab">
                    <?php echo $LANG["trash"] ?>
                </a>
            </li>
        </ul>

        <div id="maintab" class="tab-content">
            <h2>
                <?php echo $LANG["addtask"] ?>
            </h2>
            <?php showinputform($dateformat, $LANG); ?>
            <h2>
                <?php echo $LANG["todo"] ?>
            </h2>
            <?php listtasks($json_a, "open", $dateformat, $LANG, $rowstyle); ?>
        </div>
        <!-- tab div -->

        <div class="tab-content" id="finishedtab">
            <h2>
                <?php echo $LANG["finishedtasks"] ?>
            </h2>
            <?php listtasks($json_a, "closed", $dateformat, $LANG); ?>
        </div>
        <!-- tab div -->

        <div class="tab-content" id="trashtab">
            <h2>
                <?php echo $LANG["trash"] ?>
            </h2>
            <?php listtasks($json_a, "deleted", $dateformat, $LANG); ?>
        </div>
        <!-- tab div -->