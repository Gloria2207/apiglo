<?php
$pdo = new PDO('mysql:host=localhost;dbname=ma_base_de_donnees', 'mon_utilisateur', 'mon_mot_de_passe');

$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = :email AND password = :password');
$stmt->execute(['email' => $_POST['email'], 'password' => $_POST['password']]);
$user = $stmt->fetch();

if ($user) {
    session_start();
    $_SESSION['user'] = $user;

    header('Location: home.php');
    exit;
} else {
    echo 'Adresse e-mail ou mot de passe incorrect.';
}
?>

