<?php
require_once(__DIR__ . '/config/db_connect.php');
require_once(__DIR__ . '/includes/header.php');
require_once(__DIR__ . '/src/post/add_content.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Ajouter du contenu au blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>



<body>
    <h1>Ajouter du contenu au blog</h1>

    <form action="src/post/add_content.php" method="post" enctype="multipart/form-data">
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