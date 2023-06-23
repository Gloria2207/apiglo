<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>services </title>
    <link rel="stylesheet" href="./css/contactcss.css">
    <style>


    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  </head>
  <body>

    <nav class="navbar">
		<div class="navbar-logo">
			<img src="./image/all.jpg" alt="Logo de l'entreprise">
		</div>
		<a href="./home.php">Home</a>   
		<a href="./about.php">About</a>
        <a href="./Services.php">Services</a>
		<a class="active"href="#">Contact</a>
        <div class="profile-logo">
			<a href="./profile.php">
                <img src="./image/profile.avif" alt="Description de l'image">
               </a>
		</div>
	</nav>
<!-- -------------------------BODY-------------------------- -->


<body>
	<header>
		<h1>Contactez-nous</h1>
	</header>
	<main>
		<form>
			<label for="nom">Nom :</label>
			<input type="text" id="nom" name="nom" required>

			<label for="email">E-mail :</label>
			<input type="email" id="email" name="email" required>

			<label for="message">Message :</label>
			<textarea id="message" name="message" required></textarea>

			<button type="submit">Envoyer</button>
		</form>
	</main>
	







    <!--------------------FOOtER----------------------------- -->

    

<footer>
    <div class="footer-wrapper">
      <p class="contact-us">Contactez-nous : <a href="tel:+0123456789">6 76 69 59 77</a> | <a href="mailto:contact@example.com">info@fulife-consulting.cm</a></p>
      <p class="home">@HOME | Tous droits réservés © 2023</p>
    </div>
  </footer>
  </html>