<?php
session_start();
require_once("access.php");
$error = '';

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(!$DB = new PDO(
            "mysql:host=localhost;dbname=roles_and_permissions", "root", ""
        )) {
            die("Could not connect to the database...");
        }

        // save to database
        $arr['email'] = $_POST['email'];
        $arr['password'] = hash('sha1', $_POST['password']);

        $query = "SELECT * FROM users
        WHERE email = :email && password = :password
        LIMIT 1";
        $stmt = $DB->prepare($query);
        if($stmt) {
            $check = $stmt->execute($arr);
            if($stmt) {
                $check = $stmt->execute($arr);
                if ($check) {
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (is_array($data) && count($data) > 0) {
                        $_SESSION['sess_id'] = $data[0]['user_id'];
                        $_SESSION['sess_name'] = $data[0]['username'];
                        $_SESSION['sess_role'] = $data[0]['role'];
                    } else {
                        $error = "Wrong user name or password ...";
                    }
                }
            }

            if($error == '') {
                header("Location: index.php");
                die;
            }
        }

    }
?>

<?php require_once("header.php"); ?>

<?php if($error != "") {
    echo "<br /><span style='color: red'>$error</span><br />";
}?>

<?php
    echo '
        <style>
            .input {
                border-radius: 0.5rem;
                border: solid thin #aaa;
                padding: 10px;
                margin: 0.5rem;
            }

            .button {
                border-radius: 0.5rem;
                border: solid thin #aaa;
                padding: 10px;
                margin: 0.5rem;
                cursor: pointer;
            }
        </style>
        <h1>Login</h1>

        <form method="post">
            <input class="input" type="email" name="email" placeholder="email" required />
            <br />
            <input class="input" type="password" name="password" placeholder="password" required />
            <br />
            <input class="button" type="submit" value="Login" />
        </form>
    ';
?>
<?php require_once("footer.php"); ?>