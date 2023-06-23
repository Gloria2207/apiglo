<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="./css/inscriptioncss.css">
</head>
<body>
	<div class="container">
		<div class="logo">
			<img src="./image/all.jpg" alt="Logo">
		</div>
		<div class="form">
			<h2>Inscrivez-vous</h2>
			<form method="post" action="./inscipt.php">
				<label for="nom">Nom :</label>
				<input type="text" id="nom" name="nom" required>

				<label for="prenom">Prénom :</label>
				<input type="text" id="prenom" name="prenom" required>

				<label for="email">Adresse e-mail :</label>
				<input type="email" id="email" name="email" required>

				<label for="tel">Numéro de téléphone :</label>
				<input type="tel" id="tel" name="tel" required>

				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="password" required>

				<label for="confirm-password">Confirmez le mot de passe :</label>
				<input type="password" id="confirm-password" name="confirm-password" required>

				<button type="submit" onclick="redirectToPage()">S'inscrire</button>
			</form>
		</div>
	</div>
	<script>
    function redirectToPage() {
      // Changer l'URL de la page en cours d'exécution
      window.location.href = "connexion.php";
    }
	</script>
</body>
</html>