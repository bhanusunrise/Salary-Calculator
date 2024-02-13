<?php

include_once 'Functions/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    echo validCheck($username, $password);
}
?>