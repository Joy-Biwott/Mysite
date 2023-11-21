<?php

if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $password = $_POST["password"];
    $rptPassword = $_POST["rpt-password"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $password, $rptPassword ) !== false){
       header("location: ../signup.php?error=emptyinput");
       exit(); 
    }
    if (invalidUid($username) !== false){
        header("location: ../signup.php?error=invalidUid");
        exit(); 
     }
     if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit(); 
     }
     if (pwdMatch($password, $rptPassword) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit(); 
     }
     if (uidExists($conn, $username) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit(); 
     }
     createUser($conn, $name, $email, $username, $password);

} else {
    header("location: ../signup.php");
    exit();
}