<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div class="wrapper">
        <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="blog.php">Find Blogs</a></li>
                    <?php 
                        if(isset($_SESSION["useruid"])){
                            echo "<li><a href="profile.php">Profile Page</a></li>";
                            echo "<li><a href="login.php">Log in</a></li>";
                        }else{
                            echo "<li><a href="signup.php">Sign up</a></li>";
                            echo "<li><a href="login.php">Log in</a></li>"; 
                        }
                    ?>
                    <li><a href="signup.php">Sign up</a></li>
                    <li><a href="login.php">Log in</a></li> 
                </ul>    
            </nav>
        </div>