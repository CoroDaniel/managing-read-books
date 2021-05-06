<?php
    session_start();
    function navbar(){
        echo <<<EOT
            <ul class="logo-content">
                <li class="logo"><a href="../index.php"><img src="../assets/images/logo.png" alt="book-logo"></a></li>
            </ul>
            <ul>
                <li><a href="../index.php" class="push-left">Account</a></li>
                <!-- <li>"><a href="../../pages/index.html">Username</a></li> -->
                <li><a href="./books.php">My Books</a></li>
                <li><a href="./insert.php">Add Book</a></li>
EOT;
        if (!empty($_SESSION['email'])){
            echo <<<EOT
                <li id="logout"><a href="../../backend/logout.php">Logout</a></li>
            </ul>
EOT;
        }
    }
?>