<?php
// Se connecter à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yeah";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Récupérer les données du formulaire
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$nom = mysqli_real_escape_string($conn, $_POST['nom']);
	$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);

	// Mettre à jour les informations de l'utilisateur dans la base de données
	$query = "UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', email = '$email', tel = '$tel' WHERE id = $id";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("La requête SQL a échoué : " . mysqli_error($conn));
	}

	// Rediriger l'utilisateur vers la page qui affiche la liste des utilisateurs
	header('Location: viewuser.php');
	exit();
}

// Récupérer l'ID de l'utilisateur à partir de la requête HTTP GET
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Récupérer les informations de l'utilisateur à partir de la base de données
$query = "SELECT nom, prenom, email, tel FROM utilisateurs WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
	die("La requête SQL a échoué : " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
	die("Aucun utilisateur trouvé pour l'ID $id");
}

// Afficher le formulaire pré-rempli avec les informations actuelles de l'utilisateur
?>
<form method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<label for="nom">Nom :</label>
	<input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($row['nom']); ?>"><br>
	<label for="prenom">Prénom :</label>
	<input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>"><br>
	<label for="email">E-mail :</label>
	<input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>"><br>
	<label for="tel">Téléphone :</label>
	<input type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars($row['tel']); ?>"><br>
	<input type="submit" value="Enregistrer">
</form>

<?php
// Fermer la connexion à la base de données
mysqli_close($conn);
?>

<style>/* Styles généraux */
body {
	font-family: Arial, sans-serif;
}

/* Styles du formulaire */
form {
	border: 1px solid #ddd;
	padding: 20px;
	max-width: 600px;
	margin: 0 auto;
}

form label {
	display: block;
	margin-bottom: 5px;
	font-weight: bold;
}

form input[type=text],
form input[type=email],
form input[type=tel] {
	width: 100%;
	padding: 10px;
	margin-bottom: 20px;
	border: 1px solid #ccc;
	border-radius: 5px;
	font-size: 16px;
}

form input[type=submit] {
	display: block;
	background-color: #333;
	color: #fff;
	padding: 10px;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
}

form input[type=submit]:hover {
	background-color: #555;
}</style>