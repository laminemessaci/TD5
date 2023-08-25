<?php
require_once(__DIR__ . '/config/db_connect.php');
require_once __DIR__ . '/includes\header.php';
require_once(__DIR__ . '/src/post/add_content.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Liste des articles :</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>



<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Liste des Articles</title>

    </head>

    <body>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Liste des Articles</title>
            <!-- Inclure les fichiers CSS de Bootstrap 4 -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        </head>

        <body>

            <!DOCTYPE html>
            <html>

            <head>
                <title>Liste des Articles</title>
                <!-- Inclure les fichiers CSS de Bootstrap 4 -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            </head>

            <body>

                <div class="container mt-5">
                    <h2>Liste des Articles</h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <?php


                            try {
                                // Récupérer les articles depuis la base de données
                                $query = "SELECT id, title, comment, image_path FROM articles";
                                $stmt = $conn->prepare($query);
                                $stmt->execute();

                                $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                foreach ($articles as $article) {
                                    $cheminAbsolu = preg_replace('/^\.\.\/\.\.\//', '', $article["image_path"]);


                                    echo '
                    <div class="card mb-3">
                        <img class="card-img-top" src="' .  $cheminAbsolu . '"  alt="Image de l\'article">
                        <div class="card-body">
                            <h5 class="card-title">' . $article["title"] . '</h5>
                            <p class="card-text">' . $article["comment"] . '</p>
                            <a href="#" class="btn btn-primary">Lire la suite</a>
                        </div>
                    </div>';
                                }
                            } catch (PDOException $e) {
                                echo "Erreur : " . $e->getMessage();
                            }

                            $conn = null;
                            ?>
                        </div>
                    </div>
                </div>


                <!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

            </body>

            </html>



        </body>

        </html>