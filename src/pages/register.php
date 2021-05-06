<?php
    require_once "../components/header-page.php"
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../assets/images/icon.png" type="image/x-icon"/>
        <title>Register</title>
        <link rel="stylesheet" href="../css/register.css">
        <link rel="stylesheet" href="../css/header-page.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    <a href="../index.php" id="log">Login</a> | <a id="reg">Register</a>
                </div>
                <div class="login-content">
                    <input type="text" id="username" name="username" placeholder="Username">
                    <input type="text" id="email" name="email" placeholder="Email">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <button type="submit" id="login-submit">Submit</button>
                </div>
            </div>
        </main>

         <footer>
            <div class="copyright">
                <p>&#169;Copyright 2021 by Ionut and Daniel. All Rights Reserved.</p>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
        <script>
            //get form data
            $(function () {
                $('button').on('click', function () {
                    var username = $('#username').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var hashPassword = CryptoJS.MD5(password);
                })
            });
        </script>    </body>
</html>