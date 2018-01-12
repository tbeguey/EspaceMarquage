
<html>
<head>
    <title>Welcome Home</title>

		<!-- Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('jquery/jquery-1.10.2.min.js');?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>

	<link href="<?php echo base_url('bootstrap/css/Site.css');?>" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="<?php echo base_url('materialize/css/materialize.min.css'); ?>" media="screen,projection" />
    <script type="text/javascript" src="<?php echo base_url('materialize/js/materialize.min.js');?>"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script type="text/javascript" src="<?php echo base_url('html2canvas/html2canvas.min.js');?>"></script>
    <link href="<?php echo base_url('dropzone/dropzone.css');?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('dropzone/dropzone.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('ckeditor/ckeditor.js');?>"></script>
</head>

<style>

.navbar-title {
	font-size: 30px;
	color : white;
	float: left;
}

</style>

<body style="background-color:#e0e0e0">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-title" href="<?php echo base_url(); ?>">Espace Marquage</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>Accueil</li>
                    <li>À propos de</li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
	</br>
    <div class="container body-content">
