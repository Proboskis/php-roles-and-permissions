<?php
session_start();
require_once("access.php");
access('RECEPTIONIST');
require_once("header.php");
?>
<?php
    echo '
        <h1>This is the receptionist page</h1>
    ';
?>
<?php require_once("footer.php"); ?>