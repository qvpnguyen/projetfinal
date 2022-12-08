<?php
// Créer les cookies
$dureeEnSecondes = 60 * 60 * 24 * 2; // 2 jours
setcookie("couleur", $_POST["choix_couleur"], time() + $dureeEnSecondes);
header("Location: preferences.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection vers préférences</title>
    <style>
        <?php
        if (ISSET($_SESSION['utilisateurConnecte'])) {
            if (ISSET($_COOKIE["couleur"])) {
                echo "body {background-color:".$_COOKIE["couleur"]."}";
            }
        }
        ?>
    </style>
</head>
<body>
    <h1>Redirection vers les préférences du client</h1>
</body>
</html>