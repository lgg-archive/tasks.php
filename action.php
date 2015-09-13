<?php
/*
#Copyright (c) 2012 Remy van Elst
#Permission is hereby granted, free of charge, to any person obtaining a copy
#of this software and associated documentation files (the "Software"), to deal
#in the Software without restriction, including without limitation the rights
#to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
#copies of the Software, and to permit persons to whom the Software is
#furnished to do so, subject to the following conditions:
#
#The above copyright notice and this permission notice shall be included in
#all copies or substantial portions of the Software.
#
#THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
#IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
#FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
#AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
#LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
#OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
#THE SOFTWARE.
*/

require_once("core/core.php");

if(!$ajax){
    require_once("web/header.php");
}

if (!$allow_access) {
    if($_GET['action'] == 'login'){
        if (!empty($_GET['upass']) && !empty($_GET['ulogin'])) {
            if (login($login, $pass, $_GET['ulogin'], $_GET['upass'])) {
                echo $LANG["logok"];
            } else {
                echo $LANG["logfail"];
            }
        } else {
            $isparamsok = false;
        }
    }else{
        echo $LANG["logneeded"];
    }
} else {
    if (empty($_GET['action'])) {
        echo $LANG["noactiongiven"];
    } else {
        $isparamsok = true; //Check if we send all parameters right
        $found = 0;
        switch ($_GET['action']) {
            case 'list':
                if (!empty($_GET['tab'])) {
                    if($_GET['tab'] == 'open'){
                        listtasks($json_a, "open", $dateformat, $LANG, $rowstyle);
                    }else{
                        listtasks($json_a, "closed", $dateformat, $LANG);
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'edit':
                if (!empty($_GET['id'])) {
                    $taskid = htmlspecialchars($_GET['id']);
                    require_once("web/form_edit.php"); //render edit form
                    if ($found == 0) {
                        echo $LANG["etasknotfound"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'add':
                if (!empty($_GET['task']) && !empty($_GET['prio'])) {
                    $id = substr(md5(time()), 0, 20);
                    $task = htmlspecialchars($_GET['task']);
                    $duedate = htmlspecialchars($_GET['duedate']);
                    $priority = htmlspecialchars($_GET['prio']);
                    $dateadded = $dateformat;

                    //If the due date is empty we replace it with a dash.
                    if (empty($duedate) || !preg_match('/([0-9]{2}-[0-9]{2}-[0-9]{4})/', $duedate)) {
                        $duedate = "-";
                    }

                    //Validating priority. Only 4 possibilities.
                    if ($priority != "1" && $priority != "2" && $priority != "3" && $priority != "4") {
                        $priority = 2;
                    }

                    //Create task
                    $json_add["tasks"][$id] = array(
                        "task" => $task,
                        "status" => "open",
                        "duedate" => $duedate,
                        "dateadded" => $dateadded,
                        "priority" => $priority
                    );

                    //RW
                    $current = file_get_contents($file);
                    $current = json_decode($current, TRUE);

                    if (is_array($current)) {
                        $current = array_merge_recursive($json_add, $current);
                    } else {
                        $current = $json_add;
                    }

                    $current = json_encode($current);
                    if (file_put_contents($file, $current, LOCK_EX)) {
                        echo $LANG["taskadded"];
                    } else {
                        echo $LANG["etasknotadded"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'update':
                if (!empty($_GET['id']) && !empty($_GET['task']) && !empty($_GET['prio'])) {
                    #update task
                    $taskid = htmlspecialchars($_GET['id']);
                    $senttask = htmlspecialchars($_GET['task']);
                    $duedate = htmlspecialchars($_GET['duedate']);
                    $priority = htmlspecialchars($_GET['prio']);

                    //If the due date is empty we replace it with a dash.
                    if (empty($duedate) || !preg_match('/([0-9]{2}-[0-9]{2}-[0-9]{4})/', $duedate)) {
                        $duedate = "-";
                    }

                    //Validating priority. Only 4 possibilities.
                    if ($priority != "1" && $priority != "2" && $priority != "3" && $priority != "4") {
                        $priority = 2;
                    }

                    foreach ($json_a as $item => $task) {
                        if ($item == $taskid) {
                            $found = 1;
                            $current = file_get_contents($file);
                            $current = json_decode($current, TRUE);
                            $json_update["tasks"]["$item"] = array(
                                "task" => $senttask,
                                "status" => "open",
                                "duedate" => $duedate,
                                "priority" => $priority
                            );
                            $replaced = array_replace_recursive($current, $json_update);
                            $replaced = json_encode($replaced);
                            if (file_put_contents($file, $replaced, LOCK_EX)) {
                                echo $LANG["taskupdated"];
                            } else {
                                echo $LANG["eupdatetask"];
                            }
                        }
                    }
                    if ($found == 0) {
                        echo $LANG["etasknotfound"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'delete':
                if (!empty($_GET['id'])) {
                    $taskid = htmlspecialchars($_GET['id']);
                    foreach ($json_a as $item => $task) {
                        if ($item == $taskid) {
                            $found = 1;
                            $current = file_get_contents($file);
                            $current = json_decode($current, TRUE);
                            $json_delete["tasks"][$taskid]["status"] = "deleted";
                            $done = array_replace_recursive($current, $json_delete);
                            $done = json_encode($done);
                            if (file_put_contents($file, $done, LOCK_EX)) {
                                echo $LANG["taskdeleted"];
                            } else {
                                echo $LANG["etasknotdeleted"];
                            }
                        }
                    }
                    if ($found == 0) {
                        echo $LANG["etasknotdeleted"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'kill':
                if (!empty($_GET['id'])) {
                    $taskid = htmlspecialchars($_GET['id']);
                    foreach ($json_a as $item => $task) {
                        if ($item == $taskid) {
                            $found = 1;
                            $current = file_get_contents($file);
                            $current = json_decode($current, TRUE);
                            unset($current["tasks"][$taskid]);
                            $done = json_encode($current);
                            if (file_put_contents($file, $done, LOCK_EX)) {
                                echo $LANG["taskkilled"];
                            } else {
                                echo $LANG["etasknotkilled"];
                            }
                        }
                    }
                    if ($found == 0) {
                        echo $LANG["etasknotfound"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'restore':
                if (!empty($_GET['id'])) {
                    $taskid = htmlspecialchars($_GET['id']);
                    foreach ($json_a as $item => $task) {
                        if ($item == $taskid) {
                            $found = 1;
                            $current = file_get_contents($file);
                            $current = json_decode($current, TRUE);
                            $json_delete["tasks"][$taskid]["status"] = "open";
                            $done = array_replace_recursive($current, $json_delete);
                            $done = json_encode($done);
                            if (file_put_contents($file, $done, LOCK_EX)) {
                                echo $LANG["taskrestored"];
                            } else {
                                echo $LANG["etasknotrestored"];
                            }
                        }
                    }
                    if ($found == 0) {
                        echo $LANG["etasknotfound"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'done':
                if (!empty($_GET['id'])) {
                    $taskid = htmlspecialchars($_GET['id']);
                    foreach ($json_a as $item => $task) {
                        if ($item == $taskid) {
                            $found = 1;
                            $current = file_get_contents($file);
                            $current = json_decode($current, TRUE);
                            $json_done["tasks"][$taskid]["status"] = "closed";
                            $json_done["tasks"][$taskid]["donedate"] = $dateformat;
                            $done = array_replace_recursive($current, $json_done);
                            $done = json_encode($done);
                            if (file_put_contents($file, $done, LOCK_EX)) {
                                echo $LANG["taskdone"];
                            } else {
                                echo $LANG["etasknotdone"];
                            }
                        }
                    }
                    if ($found == 0) {
                        echo $LANG["etasknotfound"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'lang':
                if (!empty($_GET['lang'])) {
                    if (changelang($_GET['lang'])) {
                        echo $LANG["langdone"];
                    } else {
                        echo $LANG["langfailed"];
                    }
                } else {
                    $isparamsok = false;
                }
                break;
            case 'logout':
                logout();
                echo $LANG["logoutok"];
                break;
            default:
                echo $LANG["noactiongiven"];
                break;
        }
        if (!$isparamsok) {
            echo $LANG["wrongparams"];
        }
    }
}

//Redirect
if ($_GET['action'] != 'edit' && !ajax) {
    echo $LANG["redirected"];
    redirect();
}

if(!$ajax){
    require_once("web/footer.php");
}
?>