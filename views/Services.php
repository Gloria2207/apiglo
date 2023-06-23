<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>services </title>
    <link rel="stylesheet" href="./css/Servicescss.css">
    <style>


    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  </head>
  <body>

    <div class="announcement-banner">
      <div class="announcement-content">
        <span class="announcement-text">Nouveau produit en promotion !</span>
      </div>
      </div>
    <style>
      /* Style pour announcement ............... */
      .announcement-banner {
        position: inherit;
        top: 0;
        left: 0;
        width: 100%;
        height: 40px;
        background-color: #0077be;
        z-index: 9999;
        overflow: hidden;
        }
        
        .announcement-content {
        display: flex;
        animation: move-left 40s linear infinite;
        }
        
        .announcement-text {
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        padding: 10px;
        }
        
        @keyframes move-left {
        50% {
          transform: translateX(100%);
        }
        100% {
          transform: translateX(-100%);
        }
        }
    </style>

    <nav class="navbar">
		<div class="navbar-logo">
			<img src="./image/all.jpg" alt="Logo de l'entreprise">
		</div>
		<a href="home.php">Home</a>   
		<a href="about.php">About</a>
        <a class="active" href="#">Services</a>
		<a href="./contact.php">Contact</a>
        <div class="profile-logo">
          <a href="./profile.php">
            <img src="./image/profile.avif" alt="Description de l'image">
           </a>
          </div>
      <style>
        
      </style>

		</div>
	</nav>
<!-- --------------------ARTAiCLES ------------------------ -->

<header>
  <input type="text" id="search" placeholder="Rechercher une maison par nom">
  <button onclick="searchHouse()">Rechercher</button>
  <button class="color-changing-button">Autres services</button>

<!-- utilisation de session pour afficher le buton publier -->
  <?php
session_start(); 

// Vérifier si l'utilisateur est connecté (variable de session user_id définie)
if (isset($_SESSION["user_id"])) {
  $email = $_SESSION["user_email"];

  if ($email == "achind.zeugo@2026.ucac-icam.com") {
    echo '<a href="connn.php"><button>Publier</button></a>';
  }
}
?>
  <style>
  /* Centrer la section */
#mai {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

/* Styling des articles */
.house {
  background-color: #f2f2f2;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  margin: 20px;
  padding: 20px;
  width: 300px;
}

.house img {
  display: block;
  margin: auto;
  max-width: 100%;
  
}

.house img:hover{
max-width: 150%;
}
.house h2 {
  font-size: 1.5rem;
  margin-top: 0;
}

.house p {
  font-size: 1rem;
  margin-bottom: 10px;
}

.house button {
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

.house button:hover {
  background-color: #0062cc;
}
  </style>
</header>

<div class="product-modal">
  <div class="product-modal-content">
    <button class="close-modal-btn">Fermer</button>
   <h2>chambre 1</h2>
   <p>Prix: 30 000F</p>
    <p>Quartier: Bonamoussadi</p>
    <p>Ville: Douala</p>
    <p>Description: Chambre + douche + balcon. </p>
    <button>Réserver</button>
  </div>
</div>

<section id="mai">
  <article class="house">
    <img src="./image/chambre1.avif" alt="Maison 1" width="300">
    <div class="details">
      <h2>chambre 1</h2>
      <p>Prix: 30 000F</p>
      <p>Quartier: Bonamoussadi</p>
      <p>Ville: Douala</p>
      <p>Description: Chambre + douche + balcon. </p>
      <button class="reservation-button" data-prix="30000">Réserver</button>
    </div>
  </article>
  <article class="house">
    <img src="./image/chambre2.png" alt="Maison 2" width="300">
    <div class="details">
      <h2>chambre 2</h2>
      <p>Prix: 25 000F</p>
      <p>Quartier:  Banengo ville B</p>
      <p>Ville: Baffousam</p>
      <p>Description: Chambre + douche. </p>
      <button class="reservation-button" data-prix="25000">Réserver</button>
    </div>
  </article>
  <article class="house">
    <img src="./image/chambre3.png" alt="Maison 3" width="300">
    <div class="details">
      <h2>chambre 3</h2>
      <p>Prix: 40 000F</p>
      <p>Quartier: Boamanga</p>
      <p>Ville: Kribi</p>
      <p>Description: Chambre + douche + balcon. </p>
      <button class="reservation-button" data-prix="40000">Réserver</button>
    </div>
  </article>
  <article class="house">
    <img src="./image/chambre 4.png" alt="Maison 4" width="300">
    <div class="details">
      <h2>chambre 4</h2>
      <p>Prix: 50 000F</p>
      <p>Quartier: Bastos</p>
      <p>Ville: Yaounde</p>
      <p>Chambre + douche + peti salon + balcon. </p>
      <button class="reservation-button" data-prix="50000">Réserver</button>
    </div>
  </article>
  <article class="house">
    <img src="./image/chambre5.avif" alt="Maison 5" width="300" length="150">
    <div class="details">
      <h2>chambre 5</h2>
      <p>Prix: 55 000F</p>
      <p>Quartier: Bonanjo</p>
      <p>Ville: Douala</p>
      <p>Chambre + douche + peti salon + balcon. </p>
      <button class="reservation-button" data-prix="55000">Réserver</button>
    </div>
</article>

  <article class="house">
    <img src="./image/chambre6.avif" alt="Maison 6" width="300">
    <div class="details">
      <h2>chambre 6</h2>
      <p>Prix: 60 000F</p>
      <p>Quartier: Golf</p>
      <p>Ville: Yaounde</p>
      <p>Chambre + douche + peti salon + balcon.. </p>
      <button class="reservation-button" data-prix="60000">Réserver</button>
    </div>
  </article>
</section>

<div id="reservation-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Réservation de la chambre</h3>
        <form>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telephone">Téléphone:</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="date-arrivee">Date d'arrivée:</label>
            <input type="date" id="date-arrivee" name="date-arrivee" required>

            <label for="date-depart">Date de départ:</label>
            <input type="date" id="date-depart" name="date-depart" required>

            <label for="methode-paiement">Méthode de paiement:</label>
            <select id="methode-paiement" name="methode-paiement">
                <option value="carte-bancaire">Carte bancaire</option>
                <option value="orange-money">Orange Money</option>
                <option value="mtn-money">MTN Money</option>
            </select>

            <button type="submit">Valider la réservation</button>
        </form>
    </div>
</div>

<!-----------------------------------------------Modal class reservation-button-------------------------------- -->

<div id="reservation-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Réservation de la chambre 5</h3>
        <form>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telephone">Téléphone:</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="date-arrivee">Date d'arrivée:</label>
            <input type="date" id="date-arrivee" name="date-arrivee" required>

            <label for="date-depart">Date de départ:</label>
            <input type="date" id="date-depart" name="date-depart" required>

            <button type="submit">Réserver</button>
        </form>
    </div>
</div>

<!-- ---------------------------------------------------------------------------------------------------------- -->
<!-- code pour afficher les donnees publiees par l'admin -->
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $image = $_FILES["image"]["name"];
//   $titre = $_POST["titre"];
//   $prix = $_POST["prix"];
//   $quartier = $_POST["quartier"];
//   $ville = $_POST["ville"];
//   $description = $_POST["description"];

//   echo "Image: " . $image . "<br>";
//   echo "Titre: " . $titre . "<br>";
//   echo "Prix: " . $prix . "<br>";
//   echo "Quartier: " . $quartier . "<br>";
//   echo "Ville: " . $ville . "<br>";
//   echo "Description: " . $description . "<br>";
// }
?>

<?php
require 'ser.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $image = $_FILES["image"]["name"];
  $titre = $_POST["titre"];
  $prix = $_POST["prix"];
  $quartier = $_POST["quartier"];
  $ville = $_POST["ville"];
  $description = $_POST["description"];

  // Afficher les informations dans des balises HTML avec un style CSS
  echo '<section id="mai">';
  echo '<div class="house">';
  echo '<img src="./image/' . $image . '" alt="' . $titre . '" width="300">';
  echo '<div class="details">';
  echo '<h2>' . $titre . '</h2>';
  echo '<p>Prix: ' . $prix . 'F</p>';
  echo '<p>Quartier: ' . $quartier . '</p>';
  echo '<p>Ville: ' . $ville . '</p>';
  echo '<p>Description: ' . $description . '</p>';
  echo '<button>Réserver</button>';
  echo '</div>';
  echo '</div>';
  echo '</section>';
}
?>

<!-- ----------------------------JAVASCRPIT POUR RECHERCHE -->
<script>
  function searchHouse() {
    // ----------------------------------------Récupérer la valeur de la barre de recherche -->
    var input, filter, articles, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    articles = document.getElementsByTagName("article");

    // ----------------------Parcourir tous les articles et cacher ceux qui ne correspondent pas à la recherche
    for (i = 0; i < articles.length; i++) {
      txtValue = articles[i].getElementsByTagName("h2")[0].textContent || articles[i].getElementsByTagName("h2")[0].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
articles[i].style.display = "";
      } else {
        articles[i].style.display = "none";
      }
    }
  }
</script>

<!-- ----------------------------reservation script--------------------------------------------------------------- -->

<script>const reservationButtons = document.querySelectorAll(".reservation-button");
const modal = document.getElementById("reservation-modal");
const modalContent = document.querySelector(".modal-content");
const modalClose = document.querySelector(".close");

reservationButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const prix = button.dataset.prix;
        const titre = button.parentNode.querySelector("h2").textContent;
        modal.style.display = "block";
        modalContent.querySelector("h3").textContent = `Réservation de ${titre}`;
        modalContent.querySelector("#methode-paiement").value = "carte-bancaire";
        modalContent.querySelector("form").addEventListener("submit", (event) => {
            event.preventDefault();
            const nom = modalContent.querySelector("#nom").value;
            const email = modalContent.querySelector("#email").value;
            const telephone = modalContent.querySelector("#telephone").value;
            const dateArrivee = modalContent.querySelector("#date-arrivee").value;
            const dateDepart = modalContent.querySelector("#date-depart").value;
            const methodePaiement = modalContent.querySelector("#methode-paiement").value;
            // Envoyer les informations de réservation et de paiement au serveur
            console.log({ nom, email, telephone, dateArrivee, dateDepart, methodePaiement, prix });
            modal.style.display = "none";
        });
    });
});

modalClose.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
</script>

<!-- -------------------Reservation css---------------------------- -->

<style>/* Style général */
/* Style général */
* {
  box-sizing: border-box;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

body {
  background-color: #f2f2f2;
}

h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  margin-bottom: 5px;
}

button {
  background-color: #1B4F72;
  border: none;
  color: white;
  cursor: pointer;
  font-size: 16px;
  padding: 10px;
}

button:hover {
  background-color: #3e8e41;
}

/* Style de la section principale */
#mai {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  grid-gap: 20px;
  justify-items: center;
  margin: 20px auto;
  max-width: 1200px;
}

.house {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.3);
  overflow: hidden;
  width: 100%;
  max-width: 350px;
}

.house img {
  display: block;
  height: auto;
  margin: 0 auto;
  max-width: 100%;
}

.details {
  padding: 20px;
}

.reservation-button {
  display: block;
  margin: 0 auto;
}

/* Style de la fenêtre modale */
.modal {
  background-color: rgba(0, 0, 0, 0.4);
  display: none;
  height: 100%;
  left: 0;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1;
}

.modal-content {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.3);
  margin: 10% auto;
  max-width: 600px;
  padding: 20px;
  position: relative;
  text-align: center;
}

.close {
  color: #aaa;
  cursor: pointer;
  font-size: 28px;
  font-weight: bold;
  position: absolute;
  right: 20px;
  top: 0;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}</style>




<footer>
  <div class="footer-wrapper">
    <p class="contact-us">Contactez-nous : <a href="tel:+0123456789">6 76 69 59 77</a> | <a href="mailto:contact@example.com">info@fulife-consulting.cm</a></p>
    <p class="home">@HOME | Tous droits réservés © 2023</p>
  </div>
</footer>
</html>