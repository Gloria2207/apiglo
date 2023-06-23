<?php

session_start(); 

if (isset($_SESSION["user_email"]) && $_SESSION["user_email"] == "achind.zeugo@2026.ucac-icam.com") {

  if (isset($_POST["titre"]) && isset($_POST["prix"]) && isset($_POST["quartier"]) && isset($_POST["ville"]) && isset($_POST["description"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "yeah";



        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $image = $_FILES['image']['name'];
      $titre = $_POST['titre'];
      $prix = $_POST['prix'];
      $quartier = $_POST['quartier'];
      $ville = $_POST['ville'];
      $description = $_POST['description'];

      $conn = mysqli_connect('localhost', 'root', '', 'yeah');

      if (!$conn) {
        die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
      }

      $sql = "INSERT INTO logements (image, titre, prix, quartier, ville, description) VALUES ('$image', '$titre', $prix, '$quartier', '$ville', '$description')";

      if (mysqli_query($conn, $sql)) {
        echo "Le logement a été ajouté avec succès à la base de données";
      } else {
        echo "Erreur d'ajout du logement à la base de données: " . mysqli_error($conn);
      }

      mysqli_close($conn);
    }
  }
}
    ?>

<!DOCTYPE html>
<html>
  <!-- buouton pour retourner a services  -->
<a href="services.php" class="blue-button">retourner</a>
<br>
<br>
<br>
<h2>modifier un logement</h2>
<a href="admin.php" class="blue-button">modifier</a>

<!--  css duboutton services  -->
  <style>
    .blue-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #0077cc;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  font-size: 1.2rem;
  font-weight: bold;
  transition: background-color 0.2s ease-in-out;
}

.blue-button:hover {
  background-color: #005ea6;
}
  </style>
<head>
  <title>Ajouter un logement</title>
  
</head>
<body>
  <h1>Ajouter un logement</h1>
  <form method="post" enctype="multipart/form-data">
    <label>Image:</label>
    <input type="file" name="image"><br>
    <label>Titre:</label>
    <input type="text" name="titre"><br>
    <label>Prix:</label>
    <input type="number" name="prix"><br>
    <label>Quartier:</label>
    <input type="text" name="quartier"><br>
    <label>Ville:</label>
    <input type="text" name="ville"><br>
    <label>Description:</label>
    <textarea name="description"></textarea><br>
    <button type="submit">Publier</button>
  </form>
</body>
</html>

<!-- modifier un logement -------------------------------------- -->




<style>
label {
  display: block;
  font-size: 1.2rem;
  margin-top: 20px;
}

input[type="file"], input[type="text"], input[type="number"], textarea {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  font-size: 1.2rem;
  margin-top: 5px;
  box-sizing: border-box;
  background-color: #f2f2f2;
}

button[type="submit"] {
  background-color: #1B4F72;
  border: none;
  color: #fff;
  padding: 10px;
  font-size: 1.2rem;
  width: 100%;
  margin-top: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #0E2B3A;
}

.error {
  color: red;
  margin-top: 5px;
}

form {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  animation: fadein 1s;
}

/* Animation de fade-in pour le formulaire */
@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>










