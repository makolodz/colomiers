<?php 
session_start();
include 'configuration/config.php'; //Fichier de configuration de la base de donnée

// On connecte à la base de donnée
try { 
    $db = new PDO("mysql:host=$hote;dbname=$nom_bd;charset=utf8", $identifiant, $mot_de_passe); 
} catch (Exception $e) { 
    die("Erreur bdd"); 
} 

$erreur = ""; //on crée la variable pour les erreurs

// on traite la requete du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $req = $db->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $req->execute([$_POST['email'], $_POST['mdp']]); 
    $user = $req->fetch(); 

    if ($user) {
        $_SESSION['admin_id'] = $user['id_admin']; // si l'id admin est trouvé
        header("Location: admin.php"); // on l'emmène à la page admin
        exit();
    } else {
        $erreur = "Identifiants incorrects."; // sinon on lui dit que c'est pas bon
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>
<body>
    <?php include 'php/components/header.php'; ?>

    <main class="formulaire">
        <form method="POST" class="form">
            <h1>CONNEXION ADMIN</h1>
            
            <?php if($erreur) echo "<p style='color:red'>$erreur</p>"; ?> <!-- Affiche l'erreur en rouge s'il y en a une-->

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit" class="btn-main">OK</button>
        </form>
    </main>

    <?php include 'php/components/footer.php'; ?>
</body>
</html>