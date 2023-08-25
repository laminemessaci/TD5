<?php
require_once(__DIR__ . '/../../config/db_connect.php');
require_once(__DIR__ . '/../../src/post/add_content.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ajouter du contenu au blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>



<body>
    <h1>Ajouter du contenu au blog</h1>

    <form action="add_content.php" method="post" enctype="multipart/form-data">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>

        <label for="comment">Commentaire :</label>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image">

        <input type="submit" value="Envoyer">
    </form>

    <a href="liste_blogs.php">Voir la liste des blogs</a>
</body>

</html>