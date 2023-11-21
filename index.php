<?php
 include_once 'header.php';
?>
        <div class="login-container">
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required/>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required/>
                <button type="submit">Login</button>
            </form>
<?php
    include_once 'footer.php';
?>