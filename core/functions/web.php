<?php
/*
 * Created by PhpStorm.
 * User: littleguga
 * Github: https://github.com/littleguga/
 * Date: 08.08.2015
 * Time: 10:17
 */

function redirect($page = "index.php")
{
    echo '<script type="text/javascript">
            setTimeout(function(){
                 window.location = "' . $page . '"
            },2000);
          </script>';
}

function listtasks($json_a, $taskstatus, $dateformat, $LANG, $rowstyle = "")
{
    //Defaults
    $havetasks = NULL;
    $tasknumber = 1;

    //Sotring
    array_sort_by_column($json_a, 'priority');

    //Render table head
    include(realpath(__DIR__ . "/../../web") . DIRECTORY_SEPARATOR . "table_head.php");

    if (is_array($json_a)) {
        foreach ($json_a as $item => $task) {
            if ($task['status'] == $taskstatus) {
                $havetasks = 1;

                //Render table body if no content
                include(realpath(__DIR__ . "/../../web") . DIRECTORY_SEPARATOR . "table_content.php");

                $tasknumber += 1;
            }
        }

        if ($havetasks == 0) {
            //Render table body if no content
            include(realpath(__DIR__ . "/../../web") . DIRECTORY_SEPARATOR . "table_notasks.php");
        }

    } else {
        //Render table body if no content
        include(realpath(__DIR__ . "/../../web") . DIRECTORY_SEPARATOR . "table_notasks.php");
    }

    //Render table end
    include(realpath(__DIR__ . "/../../web") . DIRECTORY_SEPARATOR . "table_footer.php");
}

function showinputform($dateformat, $LANG)
{
    include(realpath(__DIR__ . "/../../web") . DIRECTORY_SEPARATOR . "form_input.php"); //render inputform
}

function getrowstyle($rowstyle, $priority = null)
{
    if ($rowstyle == "striped") {
        return;
    }
    switch ($priority) {
        case 1:
            return 'class="high"';
        case 2:
            return 'class="normal"';
        case 3:
            return 'class="low"';
        case 4:
            return 'class="onhold"';
    }
}