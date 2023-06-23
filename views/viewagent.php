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

// Si le formulaire est soumis, ajouter un nouvel utilisateur
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
		// Ajouter le nouvel utilisateur
		$query = "INSERT INTO utilisateurs (nom, prenom, email, tel, password) VALUES ('$nom', '$prenom', '$email', '$tel', '$mdp')";
		$result = mysqli_query($conn, $query);

		if (!$result) {
			die("La requête SQL a échoué : " . mysqli_error($conn));
		}
	}
}

// Modifier un utilisateur existant si le formulaire est soumis
if (isset($_POST['modifier'])) {
	$id = $_POST['id'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$mdp = $_POST['mdp'];

	$query = "UPDATE utilisateurs SET nom='$nom', prenom='$prenom', email='$email', tel='$tel', password='$mdp' WHERE id=$id";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("La requête SQL a échoué : " . mysqli_error($conn));
	}
}

// Récupérer les informations des utilisateurs dont l'adresse e-mail contient "agent"
$query = "SELECT id, nom, prenom, email, tel, password FROM utilisateurs WHERE email LIKE '%agent%'";
$result = mysqli_query($conn, $query);

if (!$result) {
	die("La requête SQL a échoué : " . mysqli_error($conn));
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
		<th>Mot de passe</th>
		<th>Actions</th>
	</tr>
	<?php while ($row = mysqli_fetch_assoc($result)): ?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['nom']; ?></td>
		<td><?php echo $row['prenom']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['tel']; ?></td>
		<td><?php echo $row['password']; ?></td>
		<td>
			<button onclick="showModal('<?php echo $row['id']; ?>', '<?php echo $row['nom']; ?>', '<?php echo $row['prenom']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['tel']; ?>', '<?php echo $row['password']; ?>')">Modifier</button>
		</td>
	</tr>
	<?php endwhile; ?>
</table>

<!-- Formulaire pour ajouter un nouvel utilisateur -->
<h2>Ajouter un nouvel agent</h2>
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

<!-- Modal pour modifier un utilisateur existant -->
<div id="myModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
		<h2>Modifier un utilisateur</h2>
		<form method="post">
			<input type="hidden" id="id" name="id" required>

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

			<input type="submit" name="modifier" value="Modifier">
		</form>
	</div>
</div>

<?php
// Fermer la connexion à la base de données
mysqli_close($conn);
?>

<!-- Script JavaScript pour afficher et masquer le modal -->
<script>
	function showModal(id, nom, prenom, email, tel, mdp) {
		var modal = document.getElementById("myModal");
		var span = document.getElementsByClassName("close")[0];
		var idInput = document.getElementById("id");
		var nomInput = document.getElementById("nom");
		var prenomInput = document.getElementById("prenom");
		var emailInput = document.getElementById("email");
		var telInput = document.getElementById("tel");
		var mdpInput = document.getElementById("mdp");

		idInput.value = id;
		nomInput.value = nom;
		prenomInput.value = prenom;
		emailInput.value = email;
		telInput.value = tel;
		mdpInput.value = mdp;

		modal.style.display = "block";

		span.onclick = function() {
			modal.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	}
</script>

<style>body {
	font-family: Arial, sans-serif;
}

table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	border: 1px solid #ddd;
	padding: 8px;
	text-align: left;
}

th {
	background-color: #1B4F72;
	color: white;
}

button {
	background-color: #1B4F72;
	border: none;
	color: white;
	padding: 8px 16px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px;
	margin: 4px 2px;
	cursor: pointer;
	border-radius: 4px;
}

button:hover {
	background-color: #3e8e41;
}

form {
	border: 1px solid #ddd;
	padding: 16px;
	margin-top: 16px;
}

label {
	display: block;
	margin-bottom: 8px;
}

input[type=text], input[type=email], input[type=tel], input[type=password] {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}

input[type=submit], input[type=button] {
	background-color: #1B4F72;
	border: none;
	color: white;
	padding: 12px 20px;
	margin: 8px 0;
	cursor: pointer;
	border-radius: 4px;
}

input[type=submit]:hover, input[type=button]:hover {
	background-color: #3e8e41;
}

/* Style pour le modal */
.modal {
	display: none;
	position: fixed;
	z-index: 1;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgba(0,0,0,0.4);
}

.modal-content {
	background-color: #fefefe;
	margin: 15% auto;
	padding: 20px;
	border: 1px solid #888;
	width: 80%;
	box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);
}

.close {
	color: #aaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
}

.close:hover, .close:focus {
	color: black;
	text-decoration: none;
	cursor: pointer;
}</style>