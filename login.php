<?php
require "Database.php";

$db = new Database();

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    if ($db->logIn("users", $_POST["username"], $_POST["password"])) {
        echo "Login success";
    } else {
        echo "Wrong Username or Password";
    }
} else {
        echo "All fields are required";
}
?>