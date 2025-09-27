<?php

require "DatabaseConfig.php";

class Database {
    public $connect;
    public $data;
    public $sql;
    protected $servername;
    protected $databasename;
    protected $username;
    protected $password;

    public function __construct() {
        $dbc = new DatabaseConfig();

        $this->servername = $dbc->servername;
        $this->database = $dbc->database;
        $this->username = $dbc->username;
        $this->password = $dbc->password;

        $this->dbConnect();
    }

    function dbConnect() {
        $this->connect = mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->databasename
        );
        if ($this->connect->connect_error) {
            die("Connection failed" . $this->connect->connect_error);
        }
        return $this->connect;
    }


    function logIn($table, $username, $password) {
        $sql = "SELECT username, password FROM $table WHERE username = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row["password"])) {
                return true;
            }
        }
        return False;
    }

    function signUp($table, $fullname, $email, $username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO  $table (fullname, username, password, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ssss", $fullname, $username, $hashedPassword, $email);

        return $stmt->execute();


            
    }

}
?>