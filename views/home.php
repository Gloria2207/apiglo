<!DOCTYPE html>
<html>
  
<head>
	<title>Best Rent</title>
    <!-- ----------------------------------------------- -->
    <title>Mon carrousel Bootstrap</title>
	<!-- Lien vers Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Lien vers le fichier CSS personnalisé -->
	<link rel="stylesheet" href="./css/homecss.css">
</head>
<body>
	<nav class="navbar">
		<div class="navbar-logo">
			<img src="./image/all.jpg" alt="Logo de l'entreprise">
		</div>
		<a class="active" href="#">Home</a>
		<a href="about.php">About</a>    
        <a href="./Services.php">Services</a>
		<a href="./contact.php">Contact</a>
        <div class="profile-logo">
          <a href="./profile.php">
            <img src="./image/profile.avif" alt="Description de l'image">
           </a>
		</div>
	</nav>
<!--    -----------------------------------------------------------------------------------  -->
<head>
	
</head>
<body>
	<div class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicateurs -->
			<ul class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ul>

			<!-- Slides -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="./image/car2.avif" alt="Slide 1">
					
                    <div class="tex">
                        <h5>We offer the best renting services for any</h5>
                        <h5>problem concerning hous rent for trips and more.<h5>
                        <h5>Our priority is to satify costumers as much as possible </h5>
                        <h5>"HAVE A BETTER EXPERIENCE WITH BEST RENT"</h5>
                        
                    </div>
                    <style>
                        .arr {
                            background-color: rgb(119, 158, 158);
                        }
                        .arrow-link {
                            position: relative;
                            display: inline-block;
                            padding-right: 20px;
                            font-size: 18px;
                            color: #333;
                            text-decoration: none;
                            background-color: aquamarine;
                          }
                          
                          .arrow {
                            position: absolute;
                            top: 50%;
                            right: 0;
                            transform: translateY(-50%);
                            width: 0; 
                            height: 0; 
                            border-top: 10px solid transparent;
                            border-bottom: 10px solid transparent;
                            border-left: 10px solid #333;
                            animation-name: float;
                            animation-duration: 2s;
                            animation-iteration-count: infinite;
                            animation-timing-function: ease-in-out;
                          }
                          
                          @keyframes float {
                            0% {
                              transform: translateY(0);
                            }
                            50% {
                              transform: translateY(-10px);
                            }
                            100% {
                              transform: translateY(0);
                            }
                          }
                          
                          .arrow-link:hover .arrow {
                            animation: none;
                            transform: translate(5px, -50%);
                          }
                    </style>
				</div>
				<div class="carousel-item">
					<img src="./image/car1.avif" alt="Slide 2">
					<div class="tex">
                        <h5>Our devoted partners keep working to offer </h5>
                        <h5>Best Appartements, studios and sleeping rooms.<h5>
                        <h5>All these according to the customer's demands. </h5>
                        <h5>"HAVE A BETTER EXPERIENCE WITH BEST RENT"</h5>
                        
				</div>
				
			</div>

			<!-- Contrôles -->
			<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
    <div class="b">
        .
    </div>
    
    <div class="arr">
    <a href="Services.html" class="arrow-link">Cliquez ici pour voir nos services<span class="arrow"></span></a>
    </div>
	<!-- Lien vers Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3o6s9z8Ri6sxuvUQMKShzGC7NnXcus8M"></script>

<!-- <!DOCTYPE html>
<html>
<head>
  <title>Google Maps Example</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
  <script>
    function initMap() {
      // Create a new map object
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
      });

      // Add a marker to the map
      var marker = new google.maps.Marker({
        position: {lat: -34.397, lng: 150.644},
        map: map,
        title: 'Hello World!'
      });
    }
  </script>
</head>
<body>
  <div id="map" style="height: 500px"></div>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3o6s9z8Ri6sxuvUQMKShzGC7NnXcus8M&callback=initMap"></script>
</body>
</html>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3o6s9z8Ri6sxuvUQMKShzGC7NnXcus8M&callback=initMap"></script>

<div id="map"></div> -->
<br>
<br>
<br>

<footer>
    <div class="footer-wrapper">
      <p class="contact-us">Contactez-nous : <a href="tel:+0123456789">6 76 69 59 77</a> | <a href="mailto:contact@example.com">info@fulife-consulting.cm</a></p>
      <p class="home">@HOME | Tous droits réservés © 2023</p>
    </div>
  </footer>
</html>