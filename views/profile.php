<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>À propos de notre application web</title>
    <link rel="stylesheet" href="./css/profilecss.css">
    <style>


    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  </head>
  <body>

    <nav class="navbar">
		<div class="navbar-logo">
			<img src="./image/all.jpg" alt="Logo de l'entreprise">
		</div>
		<a href="home.php">Home</a>   
		<a href="./about.php">About</a>
        <a href="Services.php">Services</a>
		<a href="./contact.php">Contact</a>
        <div class="profile-logo">
          <a href="./profile.html">
            <img src="./image/profile.avif" alt="Description de l'image">
           </a>
		</div>
	</nav>



  <?php
session_start(); 

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

	// Vérifier si l'e-mail de l'utilisateur contient "admin"
	if (strpos($email, 'admin') !== false) {
		// Afficher les informations de l'utilisateur, à l'exception du mot de passe
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$tel = $row['tel'];
		echo "Nom : $nom<br>";
		echo "Prénom : $prenom<br>";
		echo "E-mail : $email<br>";
		echo "Téléphone : $tel<br>";
    echo "<br>";
    echo "<br>";

    echo  '<div class = "button">';
    echo '<a href="interfaceadmin.php"><button>administrer</button></a>';
    echo '</div>';
	} else {
		echo "......................";
	}
  // ------------- si c'est un agent, ca affiche........ 
  if (strpos($email, 'agent') !== false) {
    echo "vous etes connecté en tant qu'agent";

    // Afficher les informations de l'utilisateur


    $nom = $row['nom'];
		$prenom = $row['prenom'];
		$tel = $row['tel'];

echo "------------------------------------------------------------------------------------------------------------------------------";
echo '<br>';
echo '<br>';

  echo 'Nom : ' . $nom . '<br>';
  echo 'Prénom : ' . $prenom . '<br>';
  echo 'Adresse e-mail : ' . $email . '<br>';
  echo 'Téléphone : ' . $tel . '<br>';
  echo "------------------------------------------------------------------------------------------------------------------------------";

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo 'AJoutez ou modifier un logement';
    echo '<br>';
    echo '<br>';
    echo  '<div class = "button">';
    echo '<a href="connn.php"><button>administrer</button></a>';
    echo '</div>';

  }




  if (strpos($email, 'admin') === false && strpos($email, 'agent') === false) {
    echo "vous etes connecté en tant que client";

    // Afficher les informations de l'utilisateur


    $nom = $row['nom'];
		$prenom = $row['prenom'];
		$tel = $row['tel'];

echo "------------------------------------------------------------------------------------------------------------------------------";
echo '<br>';
echo '<br>';

  echo 'Nom : ' . $nom . '<br>';
  echo 'Prénom : ' . $prenom . '<br>';
  echo 'Adresse e-mail : ' . $email . '<br>';
  echo 'Téléphone : ' . $tel . '<br>';
  echo "------------------------------------------------------------------------------------------------------------------------------";

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    

  }
	// Fermer la connexion à la base de données
	mysqli_close($conn);
} else {
	// Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
	header('Location: login.php');
	exit();
}
// -------------------------using session to print user info -----------------------------------------
// if (isset($_SESSION["user_id"])) {

//   $nom = $_SESSION["user_nom"];
//   $prenom = $_SESSION["user_prenom"];
//   $email = $_SESSION["user_email"];
//   $tel = $_SESSION["user_tel"];

//   // Afficher les informations de l'utilisateur
//   // echo 'Nom : ' . $nom . '<br>';
//   // echo 'Prénom : ' . $prenom . '<br>';
//   // echo 'Adresse e-mail : ' . $email . '<br>';
//   // echo 'Téléphone : ' . $tel . '<br>';


  
// } else {
//   header("Location: connexion.php");
//   exit();
// }

?>

<br>
<br>
<form action="logout.php" method="post">
	<button type="submit" class="logout-button">Déconnexion</button>
</form>
<!-- <div class="user-info">
  <h2>Informations de l'utilisateur</h2>
  <p><strong>Nom :</strong> <?php echo $nom; ?></p>
  <p><strong>Prénom :</strong> <?php echo $prenom; ?></p>
  <p><strong>Adresse e-mail :</strong> <?php echo $email; ?></p>
  <p><strong>Téléphone :</strong> <?php echo $tel; ?></p>
</div> -->
<style>
  .user-info {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 20px;
}

.user-info h2 {
  font-size: 24px;
  margin-top: 0;
}

.user-info p {
  font-size: 18px;
  margin-bottom: 5px;
}

/* --------------button------------------- */
 .button {
  background-color: #007bff;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  font-size: 1rem;
  margin-top: 10px;
  padding: 10px 20px;
  transition: background-color 0.3s ease-in-out;
}

</style>
<!-- ------------------------FOOTER------------------------------------- -->
    <footer>
        <div class="footer-wrapper">
          <p class="contact-us">Contactez-nous : <a href="tel:+0123456789">6 76 69 59 77</a> | <a href="mailto:contact@example.com">info@fulife-consulting.cm</a></p>
          <p class="home">@HOME | Tous droits réservés © 2023</p>
        </div>
      </footer>
      </html>
<!-- ------------------button logout-------------------------- -->
      <style>
        .logout-button {
	background-color: #1B4F72;
	color: #fff;
	border: none;
	padding: 10px 20px;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	transition: background-color 0.3s ease;
}

.logout-button:hover {
	background-color: #fff;
	color: #1B4F72;
}
      </style>