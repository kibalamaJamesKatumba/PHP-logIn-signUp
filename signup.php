<?php
require "Database.php";

$db = new Database();

if (!empty($_POST["fullname"]) && !empty($_POST["email"]) &&
    !empty($_POST["username"]) && !empty($_POST["password"])) {

        if ($db->signUp("users", $_POST["fullname"],
            $_POST["email"], $_POST["username"], $_POST["password"])) {
                echo "Sign Up Success";
        } else {
            echo "Sign Up Failed";
        }
} else {
    echo "All fields required";
}
?>