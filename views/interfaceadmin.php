<!DOCTYPE html>
<html>
<head>
	<title>Interface d'Administration</title>
	<style>
		/* .logo {
			display: block;
			margin: 20px auto;
			width: 50px;
			height: 50px;
			background-color: #00f;
			border-radius: 50%;
		} */
		.navbar {
			background-color: #000;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			z-index: 1;
		}
		.navbar a {
			color: #fff;
			text-decoration: none;
			margin-right: 20px;
		}
		.navbar a:hover {
			color: #1B4F72;
		}
		.sidebar {
			background-color: #000;
			color: #fff;
			height: 100%;
			width: 200px;
			position: fixed;
			top: 70px;
			left: 0;
			overflow-x: hidden;
			padding-top: 20px;
		}
		.sidebar a {
			display: block;
			color: #fff;
			padding: 16px;
			text-decoration: none;
		}
		.sidebar a:hover {
			background-color: #1B4F72;
		}
		.content {
			margin-top: 70px;
			margin-left: 200px;
			padding: 20px;
            background-color: grey;
		}
		h1 {
			color: #00f;
		}

        .navbar img {
            margin: 20px auto;
			width: 50px;
			height: 50px;
			background-color: #00f;
			border-radius: 50%;
        }
	</style>
</head>
<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
	// Récupérer l'ID de l'utilisateur connecté
	$user_id = $_SESSION['user_id'];

	// Se connecter à la base de données
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yeah";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("La connexion à la base de données a échoué : " . mysqli_connect_error());
	}

	// Récupérer les informations de l'utilisateur
	$query = "SELECT nom, prenom, email, tel FROM utilisateurs WHERE id = $user_id";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("La requête SQL a échoué : " . mysqli_error($conn));
	}

	$row = mysqli_fetch_assoc($result);

	if (!$row) {
		die("Aucun utilisateur trouvé pour l'ID $user_id");
	}

	$email = $row['email'];

	// Vérifier si l'e-mail de l'utilisateur contient "agent"
	if (strpos($email, 'admin') !== false) {
		// Afficher le contenu de la page d'administration
		?>
		<body>
			<!-- Logo -->
			<div class="logo">
        
		    </div>
			<div class="navbar">
		    <img src="./image/all.jpg" alt="Logo de l'entreprisen">
				<a href="./profile.php">Page Principale</a>
			</div>
			<div class="sidebar">
		    <h2>-------------------</h2>
				<a href="viewuser.php">Visualiser Clients</a>
		        <h2>-------------------</h2>
				<a href="viewagent.php">Visualiser Agents</a>
		        <h2>-------------------</h2>
				<a href="#">Aller vers le Site</a>
		        <h2>-------------------</h2>
			</div>
			<div class="content">
				<h1>Interface d'Administration</h1>
			</div>
		</body>
		<?php
	} else {
		// Afficher un message d'erreur 404
		header("HTTP/1.0 404 Not Found");
		echo "Erreur 404 : Vous n'avez pas accès.";
	}

	// Fermer la connexion à la base de données
	mysqli_close($conn);
} else {
	// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
	header('Location: login.php');
	exit();
}
?>
<?php 
// session_start();

// Vérifier si l'utilisateur est connecté
// if (isset($_SESSION['user_id'])) {
// 	// Récupérer l'ID de l'utilisateur connecté
// 	$user_id = $_SESSION['user_id'];

// 	// Se connecter à la base de données
// 	$conn = mysqli_connect('localhost', 'root', ' ', 'yeah');

// 	// Vérifier si l'e-mail de l'utilisateur contient "admin"
// 	$query = "SELECT email, nom, prenom FROM utilisateurs WHERE id = $user_id";
// 	$result = mysqli_query($conn, $query);
// 	$row = mysqli_fetch_assoc($result);
// 	$email = $row['email'];
// 	$nom = $row['nom'];
// 	$prenom = $row['prenom'];

// 	if (strpos($email, 'admin') !== false) {
// 		// Afficher les informations de connexion de l'utilisateur
// 		echo "Vous êtes connecté en tant qu'administrateur. Votre ID d'utilisateur est $user_id, votre nom est $nom, votre prénom est $prenom et votre e-mail est $email.";
// 	} else {
// 		echo "Vous êtes connecté. Votre ID d'utilisateur est $user_id, votre nom est $nom, votre prénom est $prenom et votre e-mail est $email.";
// 	}

// 	// Fermer la connexion à la base de données
// 	mysqli_close($conn);
// } else {
// 	// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
// 	header('Location: login.php');
// 	exit();
// }
// ?> 