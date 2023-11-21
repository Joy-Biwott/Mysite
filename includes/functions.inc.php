<?php

function emptyInputSignup($name, $email, $username, $password, $rptPassword ) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($rptPassword)){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUid( $username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}
function invalidEmail( $email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}
function pwdMatch( $password, $rptPassword) {
    $result;
    if ($password !== $rptPassword ){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}
function uidExists( $conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result=false;
        return$result;
    }
    mysqli_stmt_close($stmt);
}
function createUser( $conn, $name, $email, $username, $password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit(); 
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);

    header("location: ../signup.php?error=none");
    exit();   
}
function emptyInputLogin($username, $password) {
    $result;
    if (empty($username) || empty($password) ){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}
function loginUser($conn, $username, $password ){
    $uidExists = uidExists( $conn, $username, $username);
    if(uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $passwordHashed = $uidExists["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }else if ($checkPassword === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["userUid"];
        header("location: ../index.php");
        exit();
    }
}