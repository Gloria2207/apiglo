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

// Récupérer les informations des utilisateurs qui ne sont pas des agents ni des administrateurs
$query = "SELECT id, nom, prenom, email, tel FROM utilisateurs WHERE email NOT LIKE '%agent%' AND email NOT LIKE '%admin%'";
$result = mysqli_query($conn, $query);

if (!$result) {
	die("La requête SQL a échoué : " . mysqli_error($conn));
}

// Si le formulaire est soumis, ajouter un nouveau client
if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$mdp = $_POST['mdp'];

	// Vérifier que l'e-mail n'est pas déjà utilisé
	$query = "SELECT COUNT(*) FROM utilisateurs WHERE email = '$email'";
	$result = mysqli_query($conn, $query);
	$count = mysqli_fetch_array($result)[0];
	if ($count > 0) {
		echo "L'e-mail est déjà utilisé.";
	} else {
		// Ajouter le nouveau client
		$query = "INSERT INTO utilisateurs (nom, prenom, email, tel, mdp) VALUES ('$nom', '$prenom', '$email', '$tel', '$mdp')";
		$result = mysqli_query($conn, $query);

		if (!$result) {
			die("La requête SQL a échoué : " . mysqli_error($conn));
		}
	}
}

// Afficher les informations des utilisateurs dans un tableau
?>
<table>
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>E-mail</th>
		<th>Téléphone</th>
		<th>Actions</th>
	</tr>
	<?php while ($row = mysqli_fetch_assoc($result)): ?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['nom']; ?></td>
		<td><?php echo $row['prenom']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['tel']; ?></td>
		<td><a href="modifier_utilisateur.php?id=<?php echo $row['id']; ?>">Modifier</a></td>
	</tr>
	<?php endwhile; ?>
</table>

<!-- Formulaire pour ajouter un nouveau client -->
<h2>Ajouter un nouveau client</h2>
<form method="post">
	<label for="nom">Nom :</label>
	<input type="text" id="nom" name="nom" required>

	<label for="prenom">Prénom :</label>
	<input type="text" id="prenom" name="prenom" required>

	<label for="email">E-mail :</label>
	<input type="email" id="email" name="email" required>

	<label for="tel">Téléphone :</label>
	<input type="tel" id="tel" name="tel" required>

	<label for="mdp">Mot de passe :</label>
	<input type="password" id="mdp" name="mdp" required>

	<input type="submit" name="submit" value="Ajouter">
</form>

<?php
// Fermer la connexion à la base de données
mysqli_close($conn);
?>
<style>
    /* Styles généraux */
body {
	font-family: Arial, sans-serif;
}

/* Styles de la barre de navigation */
.navbar {
	background-color: #333;
	color: #fff;
	display: flex;
	justify-content: space-between;
	padding: 10px;
}

.navbar img {
	height: 50px;
}

.navbar a {
	color: #fff;
	text-decoration: none;
	margin-right: 10px;
}

/* Styles de la barre latérale */
.sidebar {
	background-color: #ddd;
	padding: 20px;
	float: left;
	width: 20%;
}

.sidebar h2 {
	margin-top: 0;
	margin-bottom: 10px;
	font-size: 16px;
}

.sidebar a {
	display: block;
	color: #333;
	text-decoration: none;
	margin-bottom: 10px;
}

/* Styles du contenu */
.content {
	padding: 20px;
	float: left;
	width: 80%;
}

.content h1 {
	margin-top: 0;
	margin-bottom: 20px;
	font-size: 32px;
}

/* Styles du tableau */
table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	padding: 10px;
	text-align: left;
}

th {
	background-color: #333;
	color: #fff;
}

tr:nth-child(even) {
	background-color: #f2f2f2;
}

tr:hover {
	background-color: #ddd;
}

/* Styles du bouton Modifier */
a.btn-modifier {
	display: inline-block;
	background-color: #333;
	color: #fff;
	padding: 5px 10px;
	text-decoration: none;
	border-radius: 5px;
}

a.btn-modifier:hover {
	background-color: #555;
}
</style>