<?php
// Connexion à la base de données
$conn = mysqli_connect('localhost', 'root', '', 'yeah');

// Vérification de la connexion
if (!$conn) {
  die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
}
?>
<form method="POST">
  <div>
    <label>Entrez le titre du logement à modifier :</label>
    <input type="text" name="titre">
  </div>
  <button type="submit">Rechercher</button>
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $titre = $_POST['titre'];
  $query = "SELECT * FROM logements WHERE titre = '$titre'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>

<form method="POST">
  <div>
    <label>Image</label>
    <input type="text" name="image" value="<?php echo $row['image']; ?>">
  </div>
  <div>
    <label>Titre</label>
    <input type="text" name="titre" value="<?php echo $row['titre']; ?>">
  </div>
  <div>  
    <label>Prix</label>
    <input type="text" name="prix" value="<?php echo $row['prix']; ?>">
  </div>
  <div>
    <label>Quartier</label>
    <input type="text" name="quartier" value="<?php echo $row['quartier']; ?>">
  </div>
  <div>
    <label>Ville</label>
    <input type="text" name="ville" value="<?php echo $row['ville']; ?>">
  </div>
  <div>
    <label>Description</label>
    <textarea name="description"><?php echo $row['description']; ?></textarea>
  </div>
  <button type="submit">Modifier</button>
</form>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $image = $_POST['image'];
      $titre = $_POST['titre'];
      $prix = $_POST['prix'];
      $quartier = $_POST['quartier'];
      $ville = $_POST['ville'];
      $description = $_POST['description'];  
      $query = "UPDATE logements SET image = '$image', titre = '$titre', prix = $prix, quartier = '$quartier', ville = '$ville', description = '$description' WHERE titre = '$titre'";
      mysqli_query($conn, $query);
    }
  }
}
?>

<style>
    form {
  width: 600px;
  margin: 20px auto;
  background: #fff;
  padding: 20px;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input, textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

textarea {
  height: 200px;
}

button {
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  background: #346; 
  color: #fff;
  cursor: pointer;
}

button:hover {
  background: #258;
}
</style>