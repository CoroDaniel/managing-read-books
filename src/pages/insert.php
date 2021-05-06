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
        <script>
            $(document).ready(function() {
                adresa="../../backend/getGenres.php"
                $.get(adresa, procesareRaspuns);
            });

            function procesareRaspuns(raspuns)
	        { 
                var div = document.getElementById('categ');
                raspuns.forEach(function callbackFn(category) { 
                    var option = document.createElement('option');
                    option.setAttribute('value', category.id);
                    option.innerText = category.name;
                    div.appendChild(option);
                });
            }

            function trimite(book){
                adresa="../../backend/insertBook.php"
                dateDeTrimis=$('#insert-content').serializeArray();
                $.post(adresa, dateDeTrimis, procesareRaspunsInsert);
            }

            function procesareRaspunsInsert(raspuns){
                if(raspuns==204){
                    console.log(raspuns);                    	    
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
        <main>
            <div class="insert-form">
                <div class="insert-header">
                    <p id="ins">Add Book</p>
                </div>
                <form id="insert-content">
                    <input type="text" id="title" name="title" placeholder="Title">
                    <input type="text" id="author" name="author" placeholder="Author">
                    <textarea id="comment" placeholder="Summary/Comments"></textarea>
                    <select  id="categ" name="genre">
                        <!-- dynamic options -->
                    </select>
                </div>
                <button type="submit" id="insert-submit" onclick="trimite()">Submit</button>
            </div>
        </main>
        <footer>
            <div class="copyright">
                <p>&#169;Copyright 2021 by Ionut and Daniel. All Rights Reserved.</p>
            </div>
        </footer>
        <!-- <script>
            //get form data
            $(function () {
                $('button').on('click', function () {
                    var title = $('#title').val();
                    var author = $('#author').val();
                    var comment = $('#comment').val();
                    var categ = $('#categ option:selected').text();
                })
            }); -->
        </script>
    </body>
</html>