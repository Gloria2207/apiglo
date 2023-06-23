<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yeah";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

if ($password != $confirm_password) {
    die("Les mots de passe ne correspondent pas.");
}

$sql = "INSERT INTO utilisateurs (nom, prenom, email, tel, password) VALUES ('$nom', '$prenom', '$email', '$tel', '$password')";

if (mysqli_query($conn, $sql)) {
    
    header("Location: connexion.php");
} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>