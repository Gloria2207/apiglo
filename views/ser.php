<?php

// pour afficher les logements enregistrees dans la base de donees 
$conn = mysqli_connect('localhost', 'root', '', 'yeah');

if (!$conn) {
  die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM logements";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<article class="house">';
    echo '<img src="./image/' . $row['image'] . '" alt="' . $row['titre'] . '" width="300">';
    echo '<div class="details">';
    echo '<h2>' . $row['titre'] . '</h2>';
    echo '<p>Prix: ' . number_format($row['prix'], 0, ',', ' ') . 'F</p>';
    echo '<p>Quartier: ' . $row['quartier'] . '</p>';
    echo '<p>Ville: ' . $row['ville'] . '</p>';
    echo '<p>Description: ' . $row['description'] . '</p>';
    echo '<button>Réserver</button>';
    echo '</div>';
    echo '</article>';
  }
} else {
  echo 'Aucun logement à afficher';
}

mysqli_close($conn);
?>