<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Log in</h2>
        <form action="includes/login.inc.php" method="post">
                <input type="text" id="name" name="uid" placeholder="Username/Email"/>
                <input type="password" id="password" name="password" placeholder="Password"/>
                <button type="submit" name="submit">Log in</button>    
        </form>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"]== "emptyinput"){
                    echo "<p>FIll in all fields!</p>";
                }else if ($_GET["error"] == "wronglogin"){
                    echo "<p>Incorrect login information.</p>";
                }
            }
?>
    </section>
<?php
    include_once 'footer.php';
?>