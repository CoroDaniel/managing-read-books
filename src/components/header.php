<?php
    function navbar(){
        echo <<<EOT
            <ul class="logo-content">
                <li class="logo"><a href="./index.php"><img src="./assets/images/logo.png" alt="book-logo"></a></li>
            </ul>
            <ul>
                <li><a href="">Account</a></li>
                <!-- <li id="logout"><a href="../../pages/index.html">Username</a></li> -->
                <!-- <li id="logout"><a href="../../pages/index.html">My Books</a></li> -->
                <li><a href="./index.php">Add Book</a></li>
                <!-- <li id="logout"><a href="../../pages/index.html">Logout</a></li> -->
            </ul>
EOT;
    }
?>