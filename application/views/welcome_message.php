<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-Type: text/html; charset=iso-8859-1');
?>

<body>
	<div id="container">
		<div class="row">
			<div class="col l10 offset-l1">
				<div class="carousel carousel-slider center" data-indicators="true">
					<div class="carousel-fixed-item center">
					</div>
					<div class="carousel-item blue darken-3 white-text" href="#one!">
						<h2>Bonjour et bienvenue sur Espace Marquage</h2>
						<p class="white-text">Premi�re connexion ? Ces quelques pages vont vous guider pour r�aliser vos commandes rapidement et facilement.</p>
					</div>
					<div class="carousel-item blue darken-3 white-text" href="#two!">
						<h2>Premi�re �tape : Connexion</h2>
						<p class="white-text">Rendez vous en haut � droite pour vous connecter.</p>
					</div>
					<div class="carousel-item blue darken-3 white-text" href="#three!">
						<h2>Deuxi�me �tape : Choissiez votre produit</h2>
						<p class="white-text">Une fois le produit choisis, vous pouvez le personnaliser comme bon vous semble.</p>
						<p class="white-text">Ainsi, Espace Marquage vous l'imprimera exactement comme vous l'envoy�.</p>
					</div>
					<div class="carousel-item blue darken-3 white-text" href="#four!">
						<h2>Derni�re �tape : Commandez et recevez un r�capitulatif par mail</h2>
						<p class="white-text">Lorsque vous finaliser votre commande, vous pouvez laisser un commentaire qui sera ajout� au mail de votre commande. </p>
						<p class="white-text">Espace Marquage recevra votre commande par mail puis vous connaissez la suite.</p>
				</div>
			</div>
		</div>
	</div>
  </div>
</body>

<script>

   $('.carousel.carousel-slider').carousel();
		setInterval(function() {
			$('.carousel.carousel-slider').carousel('next');
	}, 10000);

</script>