<?php
session_start();
require_once("access.php");
require_once("header.php");
?>
<?php
    echo '
        <h1>Access denied!</h1>
    ';
?>
<?php require_once("footer.php"); ?>