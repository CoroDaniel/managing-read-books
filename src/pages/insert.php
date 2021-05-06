<?php
    require_once "../components/header-page.php"
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../assets/images/icon.png" type="image/x-icon"/>
        <title>Add Book</title>
        <link rel="stylesheet" href="../css/insert.css">
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
            <div class="insert-form">
                <div class="insert-header">
                    <p id="ins">Add Book</p>
                </div>
                <div class="insert-content">
                    <input type="text" id="title" name="title" placeholder="Title">
                    <input type="text" id="author" name="author" placeholder="Author">
                    <textarea id="comment" placeholder="Summary/Comments"></textarea>
                    <select name="categories" id="categ">
                        <option value="Classic">Classic</option>
                        <option value="Roman">Roman</option>
                        <option value="Beleristica">Beleristica</option>
                        <option value="Specialitate">Specialitate</option>
                    </select>
                    <button type="submit" id="insert-submit">Submit</button>
                </div>
            </div>
        </main>
        <footer>
            <div class="copyright">
                <p>&#169;Copyright 2021 by Ionut and Daniel. All Rights Reserved.</p>
            </div>
        </footer>
        <script>
            //get form data
            $(function () {
                $('button').on('click', function () {
                    var title = $('#title').val();
                    var author = $('#author').val();
                    var comment = $('#comment').val();
                    var categ = $('#categ option:selected').text();
                })
            });
        </script>
    </body>
</html>