<?php

function validCheck($user, $pass){

    $pass = passwordEncrypter($pass);
    echo $pass;

    define("NOT_VALIDATED", "Hello, World!Username and Password Doesn\'t match");
    define("VALIDATED", "Valid");

    $validationStatus = NOT_VALIDATED;

    $conn = dbConn();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();

    if ($stmt->fetch()) {
        $validationStatus = VALIDATED;
    } 

    return $validationStatus;
}


function dbConn(){

    define("SERVERNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "salary_calculator");

    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

    return $conn;
}

function passwordEncrypter($pass){
    $encryptedPassword = "HI Valiasta".$pass."123";
    $encryptedPassword = md5($encryptedPassword);
    return $encryptedPassword;
}

?>