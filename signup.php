<?php
$error = '';
require_once("access.php");
    function create_user_id() {
        $length = rand(4, 20);
        $number = "";
        for($i=0; $i < $length; $i++) {
            # code ...
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }

        return $number;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(!$DB = new PDO(
            "mysql:host=localhost;dbname=roles_and_permissions", "root", ""
        )) {
            die("Could not connect to the database...");
        }

        /*
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        */

        $arr['user_id'] = create_user_id();
        // var_dump($arr['user_id']);
        $condition = true;
        while($condition) {
            $query = "SELECT id FROM users WHERE user_id = :user_id LIMIT 1";
            $stmt = $DB->prepare($query);
            if($stmt) {
                $check = $stmt->execute($arr);
                if ($check) {
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (is_array($data) && count($data) > 0) {
                        $arr['user_id'] = create_user_id();
                        continue;
                    }
                }
            }
            $condition = false;
        }

        // save to database
        $arr['username'] = $_POST['username'];
        $arr['email'] = $_POST['email'];
        $arr['password'] = hash('sha1', $_POST['password']);
        $arr['role'] = "user";

        $query = "INSERT INTO users(user_id, username, email, password, role)
        VALUES (:user_id, :username, :email, :password, :role)";
        $stmt = $DB->prepare($query);
        if($stmt) {
            $check = $stmt->execute($arr);
            if(!$check) {
                $error = "Could not save to the database ...";    
            }

            if($error == '') {
                header("Location: login.php");
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
        <h1>Sign Up</h1>

        <form method="post">
            <input class="input" type="text" name="username" placeholder="name" required />
            <br />
            <input class="input" type="email" name="email" placeholder="email" required />
            <br />
            <input class="input" type="password" name="password" placeholder="password" required />
            <br />
            <input class="button" type="submit" value="Sign Up" />
        </form>
    ';
?>
<?php require_once("footer.php"); ?>