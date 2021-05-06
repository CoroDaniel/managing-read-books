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
            function trimite(codpostal)
            {
                adresa="../backend/login.php"
                dateDeTrimis=$('#login-content').serializeArray();
                $.post(adresa, dateDeTrimis, procesareRaspuns);
            }
            function procesareRaspuns(raspuns)
	        { 
                if(raspuns==200){
                    window.location.href = 'pages/books.php';	    
                }else{
                    console.log(raspuns);
                }
            }
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
                <form id="login-content">
                    <input type="email" id="email" name="email" placeholder="Email" require>
                    <input type="password" id="password" name="password" placeholder="Password" require>
                </form>
                <button type="submit" id="login-submit" onclick='trimite()'>Submit</button>
            </div>
        </main>

         <footer>
            <div class="copyright">
                <p>&#169;Copyright 2021 by Ionut and Daniel. All Rights Reserved.</p>
            </div>
        </footer>
    </body>
</html>