<?php
    require_once "./components/header.php"
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="./assets/images/icon.png" type="image/x-icon"/>
        <title>Login</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="./css/header.css">
    </head>
    <body>
        <header>
            <nav>
                <?=navbar() ?> 
            </nav>
        </header>

        <main>
            <div class="login-form">
                <div class="login-header">
                    <a id="log">Login</a> | <a href="./pages/register.php" id="reg">Register</a>
                </div>
                <div class="login-content">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" id="login-submit">Submit</button>
                </div>
            </div>
        </main>

         <footer>
            <div class="copyright">
                <p>&#169;Copyright 2021 by Ionut and Daniel. All Rights Reserved.</p>
            </div>
        </footer>
        <script src=""></script>
    </body>
</html>