<head>
    <title>Espace Marquage - Gravure & Tampon</title>

    <script src="<?php echo base_url('jquery/jquery-1.10.2.min.js');?>"></script>

	<link type="text/css" rel="stylesheet" href="<?php echo base_url('materialize/css/materialize.min.css'); ?>" media="screen,projection" />
    <script type="text/javascript" src="<?php echo base_url('materialize/js/materialize.min.js');?>"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script type="text/javascript" src="<?php echo base_url('html2canvas/html2canvas.min.js');?>"></script>
    <link href="<?php echo base_url('dropzone/dropzone.css');?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('dropzone/dropzone.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js');?>"></script>


	<link href="<?php echo base_url('assets/css/header.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/footer.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/welcome_message.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/tampon/index.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/tampon/personalize.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/connexion/index.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/encre/personalize.css');?>" rel="stylesheet">

</head>


<nav class="nav-extended">
    <div class="nav-wrapper">
		<a class="navbar-title brand-logo center" id="logo" href="<?php echo base_url(); ?>">Espace Marquage</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul id="nav-mobile" class="left hide-on-med-and-down">
			<li><a href="<?php echo base_url('tampon'); ?>">Tampon</a></li>
			<li><a href="<?php echo base_url('gravure'); ?>">Gravure</a></li>
			<li><a href="<?php echo base_url('encre'); ?>">Recharges d'encres</a></li>
		</ul>
		<?php 
		if (!$this->ion_auth->logged_in())
		{
			echo "<a type='button' class='btn waves-effect waves-light orange hide-on-med-and-down right' style='margin:15px;' href='" . base_url('connexion') . "'><i class='material-icons left' style='margin-top:-14px;'>account_box</i>SE CONNECTER</a>";
		}
		else
		{
			echo "<a type='button' class='btn waves-effect waves-light red hide-on-med-and-down right' style='margin:15px;' href='" . base_url('connexion/logout') . "'><i class='material-icons left' style='margin-top:-14px;'>account_box</i>SE DECONNECTER</a>";
			echo "<span class='right hide-on-med-and-down'>" . $this->ion_auth->user()->row()->username . "</span>";
		}

		if($this->ion_auth->is_admin())
		{
			echo "<a class='right hide-on-med-and-down' href='" . base_url('admin') . "' style='margin-right:15px;'>Administration</a>";
		}
		?>
		<ul class="side-nav" id="mobile-demo">
			<?php
			if (!$this->ion_auth->logged_in())
			{
				echo "<li><a type='button' class='btn waves-effect waves-light orange' style='margin:15px; href='" . base_url('connexion') . "'><i class='material-icons left'>account_box</i>SE CONNECTER</a></li>";
			}
			else
			{
				echo "<a type='button' class='btn waves-effect waves-light red' style='margin:15px; href='" . base_url('connexion/logout') . "'><i class='material-icons left'>account_box</i>SE DECONNECTER</a>";
			}
			?>
			<hr>
			<li><a href="<?php echo base_url('tampon'); ?>">Tampon</a></li>
			<li><a href="<?php echo base_url('gravure'); ?>">Gravure</a></li>
			<li><a href="<?php echo base_url('encre'); ?>">Recharges d'encres</a></li>
		</ul>
    </div>
</nav>

</br>

<script>

	$(document).ready(function(){
	    $(".button-collapse").sideNav();
	});

</script>
