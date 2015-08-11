<?php

/* Copyright (c) 2012 Remy van Elst
 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:

 The above copyright notice and this permission notice shall be included in
 all copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 THE SOFTWARE.*/
require_once("web/header.php");

$ok = true;
//First open the JSON file
if (!($debugtaskfile = file_get_contents($file))) {
    $ok = false;
    echo "<span class='error'>Json path: " . $file . " " . $LANG["cantopenjson"] . "</span>";
}

//Check if it is a valid file
if (!($json_debug = json_decode($debugtaskfile, true))) {
    $ok = false;
    echo "<span class='error'>" . $LANG["cantdecodejson"] . "</span>";
}

if ($ok) {
    if ($allow_access) {
        require_once("web/debug.php");
    } else {
        echo $LANG["logneeded"];
        redirect();
    }
}

require_once("web/footer.php");
?>