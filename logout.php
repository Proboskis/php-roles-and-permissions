<?php
session_start();

if (isset($_SESSION['sess_name'])) {
    unset($_SESSION['sess_name']);
}

if (isset($_SESSION['sess_id'])) {
    unset($_SESSION['sess_id']);
}

header("Location: login.php");
?>