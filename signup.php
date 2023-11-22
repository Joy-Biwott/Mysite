<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Sign-up</h2>
        <form action="includes/signup.inc.php" method="post">
                <input type="text" id="name" name="name" placeholder="Full name"/>
                <input type="text" id="email" name="email" placeholder="Email"/>
                <input type="text" id="uid" name="uid" placeholder="Username"/>
                <input type="password" id="password" name="password" placeholder="Password"/>
                <input type="password" id="rpt-password" name="rpt-password" placeholder="Repeat password"/>
                <button type="submit" name="submit">sign Up</button>    
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"]== "emptyinput"){
                    echo "<p>FIll in all fields!</p>";
                }else if ($_GET["error"] == "invaliduid"){
                    echo "<p>Choose a proper username</p>";
                }
            }else if ($_GET["error"] == "invalidemail"){
                echo "<p>Choose a proper email!</p>";
            }else if ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords don't match!</p>";
            }else if ($_GET["error"] == "stmtfailed"){
                echo "<p>Something went wrong, try again!</p>";
            }else if ($_GET["error"] == "usernametaken"){
                echo "<p>Username already taken!</p>";
            }
                else if ($_GET["error"] == "none"){
                    echo "<p>You have signed up!</p>";
                }
?>
    </section>

<?php
    include_once 'footer.php';
?>