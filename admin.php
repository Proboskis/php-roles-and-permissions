<?php
session_start();
require_once("access.php");
access('ADMIN');
require_once("header.php");
?>
<?php
    echo '
        <h1>This is the administrator page</h1>
    ';
?>
<?php if (access("ADMIN", false)): ?>
        <form action="#" method="POST">
            <select name="role-selector" id="role-selector">
                <option value="user">user</option>
                <option value="accountant">accountant</option>
                <option value="receptionist">receptionist</option>
                <option value="accountant">accountant</option>
            </select>
        </form>
    <?php endif; ?>
<?php require_once("footer.php"); ?>