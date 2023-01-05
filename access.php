<?php
$_SESSION['ACCESS']["ADMIN"] =
isset($_SESSION['sess_role']) &&
      $_SESSION['sess_role'] == "administrator";

$_SESSION['ACCESS']["RECEPTIONIST"] =
isset($_SESSION['sess_role']) &&
     ($_SESSION['sess_role'] == "receptionist"
   || $_SESSION['sess_role'] == "administrator"
);

$_SESSION['ACCESS']["ACCOUNTANT"] =
isset($_SESSION['sess_role']) &&
     ($_SESSION['sess_role'] == "accountant"
   || $_SESSION['sess_role'] == "administrator"
);

$_SESSION['ACCESS']["USER"] =
isset($_SESSION['sess_role']) &&
     ($_SESSION['sess_role'] == "user"
   || $_SESSION['sess_role'] == "receptionist"
   || $_SESSION['sess_role'] == "administrator"
);

function access($role, $redirect = true) {
    if(isset($_SESSION['ACCESS']) && !$_SESSION['ACCESS'][$role]) {
        if ($redirect) {
            header("Location: access_denied.php");
            die;
        }
        return false;
    }
    return true;
}
?>