<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="./css/connexioncss.css">
</head>
<body>
	<div class="container">
		<div class="form">
			<h2>Connexion</h2>
			<?php
require './script/connexionparam.php'
?>

<!-- Affichage du formulaire de connexion -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <img src="./image/all.jpg" alt="logo" width="50%">
  <label for="email">Adresse e-mail :</label>
  <input type="email" id="email" name="email" required>

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" required>

  <?php if(isset($error_message)) echo '<p style="color:red;">'.$error_message.'</p>'; ?>
  <button type="submit">Se connecter</button>
</form>
<div class="links">
				<a href="#">Mot de passe oublié ?</a>
				<a href="./inscription.php">Créer un compte</a>
			</div>
		</div>
	</div>

	<script>
    function redirectToPage() {
    //   Changer l'URL de la page en cours d'exécution
      window.location.href = "";
    }
	</script>
    <div id="container">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
      </div>
</body>
</html>
