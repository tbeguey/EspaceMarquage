<body>
	<div class="container body-content">
		<div class="row">
			<div class="col l4">
				<img src="https://www.montampon.fr/158-large_default/recharge-d-encre-pour-trodat-printy-4913.jpg"/>
			</div>
			<div class="col l6 offset-l2">
				<h3> ENCRE POUR TAMPON <?php echo $title; ?> </h3>
				<p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du "De Finibus Bonorum et Malorum" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l'éthique. Les premières lignes du Lorem Ipsum, "Lorem ipsum dolor sit amet...", proviennent de la section 1.10.32.</p>
			</div>
		</div>
		<div style="background-color:white; padding:15px; margin-bottom:10px;">
			<div class="row">
				<div class="col s4">
					<label>Prix à l'unité : </label>
					<span style="font-weight:bold; font-size:2em;">0.009€</span>
				</div>			
			</div>
			<div class="row">
				<div class="col s5">
					<label>Couleur d'encrage disponible : </label>
					<a class="btn waves-effect waves-light black color" title="Noir"><i class="material-icons">check</i></a>
					<a class="btn waves-effect waves-light red color" title="Rouge"></a>
					<a class="btn waves-effect waves-light blue color" title="Bleu"></a>
					<a class="btn waves-effect waves-light green color" title="Vert"></a>
					<a class="btn waves-effect waves-light purple color" title="Violet"></a>
				</div>
				<div class="col s5 offset-s2" style="text-align:right;">
					<label>Quantité : </label>
					<input id="input_quantity" type="number" min="1" max="9" step="1" value="1" style="font: 24pt Courier; width: 50px; height: 50px; text-align:center; margin-right:15px;">
					<a class="waves-effect waves-light btn modal-trigger" href="#mail-modal"><i class="material-icons left">shopping_cart</i>ENVOYER COMMANDE</a>
				</div>
			</div>
		</div>		
	</div>

	<div id="mail-modal" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Envoi de commande</h4>
			<label for="modal-object">Objet : </label> <input type="text" id="modal-object" value="ESPACE MARQUAGE - COMMANDE XXXXXXXX [CLIENT]"/>
			<br/>
			<textarea cols="50" rows="6" name="text-mail" id="Commentaires">Vous pouvez écrire votre texte ici.</textarea>                
			<script type="text/JavaScript">CKEDITOR.replace('Commentaires');</script>
		</div>

		<div class="modal-footer">
		  <a onclick="order()" class="modal-action modal-close waves-effect waves-green btn">ENVOYER</a>
		</div>
	</div>
</body>

<script>
	$('.color').on('click', function(){
		$('.color').each(function(){
			$(this).children().remove();
		});
		$(this).append('<i class="material-icons">check</i>');
	});

	$(document).on('ready', function(){
		$('.modal').modal();

		var black = <?php echo $black; ?>;
		if(black == false)
			$('.black').addClass('disabled');

		var red = <?php echo $red; ?>;
		if(red == false)
			$('.red').addClass('disabled');

		var blue = <?php echo $blue; ?>;
		if(blue == false)
			$('.blue').addClass('disabled');

		var green = <?php echo $green; ?>;
		if(green == false)
			$('.green').addClass('disabled');

		var purple = <?php echo $purple; ?>;
		if(purple == false)
			$('.purple').addClass('disabled');
	});

	function order(){
	
	}

</script>