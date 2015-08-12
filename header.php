
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="No Stress Gaming regroupe une structure E-sportive et une Guilde Hordeuse objectif Mythique (PVEHL) du Culte de la rive noire dans World of Warcraft.">
<meta name="author" content="">
<META NAME="Language" CONTENT="fr">
<meta name="keywords" content="wow, warcraft, guilde, culte de la rive noire,PVE, HL, Horde, Heroes of the storm" />
<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

<script src="http://static.wowhead.com/widgets/power.js"></script>
<script src="http://nostressgaming.fr/oXHR.js"></script>
<link rel="icon" type="image/png" href="icon.png" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

<title>No Stress Gaming :Esport, WoW, HOTS, Diablo, LOL</title>

<link href="http://nostressgaming.fr/bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="http://nostressgaming.fr/js/jquery-1.11.0.min.js"></script>
<script src="http://nostressgaming.fr/lightbox/js/lightbox.min.js"></script>
<link href="http://nostressgaming.fr/lightbox/css/lightbox.css" rel="stylesheet" />


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<div class="navbar-header">

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>

	<a class="navbar-brand" href="http://nostressgaming.fr/Accueil.php">  No Stress Gaming</a>
</div>
<div class="collapse navbar-collapse">

	<ul class="nav navbar-nav">
<!-- Menu Acceuil-->		
		<li><a href="http://nostressgaming.fr/Accueil.php">Accueil</a></li>
<!-- Menu Présentation-->	
		<li><a href="http://nostressgaming.fr/Presentation.php">Qui sommes nous ?</a></li>
<!-- Menu Recrutement-->
		<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Recrutement<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="http://nostressgaming.fr/World-of-warcraft/Recrutement_1.php">Formulaire</a></li>
		<li><a href="http://nostressgaming.fr/World-of-warcraft/Liste-Recrutement.php">Recrutement en cours</a></li>
		<li><a href="http://nostressgaming.fr/World-of-warcraft/Liste-Recrutement-archive.php">Archive des recrutements</a></li>
		</ul>
		</li>
			
<!-- Menu WOW-->
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">NoStress Guilde WoW<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="http://www.askmrrobot.com/wow/combatlog/guild/eu/culte_de%20la%20rive%20noire/No%20STress" target="blank">Log de raid</a></li>
				<li><a href="http://nostressgaming.fr/World-of-warcraft/Charte-de-guilde.php">Charte de guilde</a></li>
			</ul>
		</li>
<!-- Menu guide wow-->				
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">WOW Guide<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="http://nostressgaming.fr/WOWGuide/T17.php">Highmaul</a></li>
			</ul>
		</li>
<!-- Menu HOTS-->	
		<li><a href="http://nostressgaming.fr/Heroes-of-the-storm/HOTS.php">HOTS</a></li>	
<!-- Menu Forum-->				
		<li><a href="http://nostressgaming.fr/Forum/">Forum</a></li>
	</ul>
</div>
		
		
	
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
 
<!-- Ouverture de la BDD->
<?php
	try
	{
	$bdd = new PDO('mysql:host=nostressxy_actu.mysql.db;dbname=nostressxy_actu', 'nostressxy_actu', 'z6g4ZsDJ8M2D', array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	}
	catch(Exception $e)
	{
	die('Erreur : '.$e->getMessage());
	}
?> 
