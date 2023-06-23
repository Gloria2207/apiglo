<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST["email"];
  $password = $_POST["password"];

  // Connexion à la base de données
  $servername = "localhost"; 
  $username = "root"; 
  $password_db = ""; 
  $dbname = "yeah"; 

  $conn = new mysqli($servername, $username, $password_db, $dbname);

  if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
  }

  $sql= "SELECT * FROM utilisateurs WHERE email='$email' AND password='$password'";

  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION["user_id"] = $row["id"];
    $_SESSION["user_nom"] = $row["nom"];
    $_SESSION["user_prenom"] = $row["prenom"];
    $_SESSION["user_email"] = $row["email"];
    $_SESSION["user_tel"] = $row["tel"];
    header("Location: home.php");
    exit();
  } else {
    $error_message = "Adresse e-mail ou mot de passe incorrect.";
  }

  $conn->close();
}
?>