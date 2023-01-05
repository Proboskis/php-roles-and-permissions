<?php
session_start();
require_once("access.php");
access('ACCOUNTANT');
require_once("header.php");
?>
<?php
    echo '
        <h1>This is the accountant page</h1>
    ';
?>
<?php require_once("footer.php"); ?>