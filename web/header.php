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
require_once(realpath(__DIR__ . "/../core/core.php"));
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $projectname; ?></title>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $projectdesc; ?>"/>

    <script type="text/javascript" src="web/js/jquery.min.js"></script>
    <!--[if lt IE 9]><script src="web/js/html5.js"></script><![endif]-->
    <script type="text/javascript" src="web/js/prettify.js"></script>
    <script type="text/javascript" src="web/js/kickstart.js"></script>

    <link rel="stylesheet" type="text/css" href="web/css/kickstart.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="web/css/style.css" media="all"/>
</head>
<body>
<a id="top-of-page"></a>

<div id="wrap" class="clearfix">
    <div class="col_12">
