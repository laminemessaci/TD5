<?php

// $cheminDossierParent = dirname(__DIR__);
// echo $cheminDossierParent;
require_once __DIR__ . '\..\..\config\db_connect.php';

$message = "";

try {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $comment = $_POST["comment"];

        // Vérification si un fichier a été téléchargé
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $target_dir = '../../photos';
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $path = pathinfo($_FILES["image"]["name"]);
            $filename = $path['filename'];
            $ext = $path['extension'];

            // Déplacer le fichier téléchargé vers le dossier "photos"
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Insérer les données dans la base de données en utilisant PDO
                $stmt = $conn->prepare("INSERT INTO articles (title, comment, image_path) VALUES (:title, :comment, :image_path)");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':comment', $comment);
                $stmt->bindParam(':image_path', $target_file);

                if ($stmt->execute()) {
                    $message = "Aucune erreur dans le transfert du fichier. <br> Le fichier $filename.$ext  à été copié dansle repertoire photos !";
                } else {
                    $message = "Erreur lors de l'ajout du contenu.";
                }
            } else {
                $message = "Erreur lors de l'upload de l'image.";
            }
        } else {
            $message = "Aucune image sélectionnée.";
        }
    }
} catch (PDOException $e) {
    $message = "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Résultat de l'ajout de contenu</title>
    <?php
    require_once __DIR__ . '\..\..\includes\header.php';

    ?>

</head>

<body>
    <?php if ($message != '') {
        echo ' <div class="container mt-5">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Poste ajouté avec succès!</h4>'
            . $message .
            '<hr
            </div>
        </div>';
    };

    ?>

</body>
<?php
require_once __DIR__ . '\..\..\includes\footer.php';

?>

</html>