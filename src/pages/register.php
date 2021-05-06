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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
        <script>
        function trimite(codpostal)
        {
            adresa="../../backend/register-back.php"
            dateDeTrimis=$('#register-content').serializeArray();
            $.post(adresa, dateDeTrimis, procesareRaspuns);
        }
        function procesareRaspuns(raspuns)
	    {
	        $('#register-content').html(raspuns);
	    }
        </script>   

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
                <form id="register-content">
                    <input type="text" id="username" name="name" placeholder="Username">
                    <input type="text" id="email" name="email" placeholder="Email">
                    <input type="password" id="password" name="password" placeholder="Password">
                </form>
                <button type="submit" id="login-submit" onmouseover="trimite()">Submit</button>
            </div>
        </main>

         <footer>
            <div class="copyright">
                <p>&#169;Copyright 2021 by Ionut and Daniel. All Rights Reserved.</p>
            </div>
        </footer>
    </body>
</html>