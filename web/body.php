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
                <a href="#maintab" class="tabs-nav" data-target="open">
                    <?php echo $LANG["tasks"] ?>
                </a>
            </li>
            <li>
                <a href="#finishedtab" class="tabs-nav" data-target="closed">
                    <?php echo $LANG["finishedtasks"] ?>
                </a>
            </li>
            <li>
                <a href="#trashtab" class="tabs-nav" data-target="deleted">
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
            <div id="tab-table-open">
                <?php listtasks($json_a, "open", $dateformat, $LANG, $rowstyle); ?>
            </div>
        </div>
        <!-- tab div -->

        <div id="finishedtab" class="tab-content">
            <h2>
                <?php echo $LANG["finishedtasks"] ?>
            </h2>
            <div id="tab-table-closed">
                <?php listtasks($json_a, "closed", $dateformat, $LANG); ?>
            </div>
        </div>
        <!-- tab div -->

        <div id="trashtab" class="tab-content">
            <h2>
                <?php echo $LANG["trash"] ?>
            </h2>
            <div id="tab-table-deleted">
                <?php listtasks($json_a, "deleted", $dateformat, $LANG); ?>
            </div>
        </div>
        <!-- tab div -->