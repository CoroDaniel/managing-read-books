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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
        <script>
            //get form data
            $(function () {
                $('button').on('click', function () {
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var hashPassword = CryptoJS.MD5(password);
                    console.log(email, password, hashPassword);
                    alert(hashPassword);
                })
            });
        </script>
        
        <header>
            <nav>
                <?=navbar() ?> 
            </nav>
        </header>

        <!-- <div class="intro">
                This application is intended to manage the books you read.
        </div> -->
        <main>
            <div class="login-form">
                <div class="login-header">
                    <a id="log">Login</a> | <a href="./pages/register.php" id="reg">Register</a>
                </div>
                <div class="login-content">
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
    </body>
</html>