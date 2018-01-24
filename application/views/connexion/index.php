<?php header('Content-Type: text/html; charset=utf-8'); ?>

</br>

<div class="row">
	<div class="col s6" id="connection-div">
		<h2> Déjà inscrit ? </h2>
		<form action="<?php echo base_url(); ?>index.php/connexion/connection">
			<div class="col s6 offset-s3">
				<label for="connection-id">Identifiant</label>
				<input type="text" id="connection-id"/>
				<label for="connection-pass">Mot de passe</label>
				<input type="password" id="connection-pass"/>
			</div>
			<div class="col s6 offset-s3" style="margin-bottom: 15px; margin-top: 15px;">
				<a href="">Mot de passe oublié ?</a>
			</div>
			<div class="col s2 offset-s5">
				<input class="btn waves-light waves-effect green" style="padding-top:9px;" type="submit" value="VALIDER"/>
			</div>
		</form>
	</div>
	<div class="col s6" id="inscription-div">
		<h2> Pas encore inscrit ? </h2>
		<h6>Vous n'avez juste qu'à remplir ce formulaire, nous étudirons votre dossier et vous enverons vos identifiants pour vous connecter au plus vite.</h3>
		</br>
		<form action="<?php echo base_url(); ?>index.php/connexion/inscription">
			<div class="col s6 offset-s3">
				<label for="inscription-name">Enseigne</label>
				<input type="text" id="inscription-name"/>
				<label for="inscription-mail">Adresse mail</label>
				<input type="text" id="inscription-mail"/>
				<label for="inscription-number">Numéro de téléphone</label>
				<input type="text" id="inscription-number"/>
			</div>
			<div class="col s2 offset-s5">
				<input class="btn waves-light waves-effect green" style="padding-top:9px;" type="submit" value="VALIDER"/>
			</div>
		</form>
	</div>
</div>

