    <?php include("./Header.php"); ?> <!-- Incrustation du header avec le menu, la BDD et bootstrap!-->
     
    <!-- Flux d'actualitÃ© automatique avec le contenue du fichier Article_Accueil!-->
     
    <body>
<!DOCTYPE html>
<html lang="en">


        <link rel="shortcut icon" href="../favicon.ico"> 
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="http://nostressgaming.fr/slidedown/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="http://nostressgaming.fr/slidedown/css/style.css" />

		<!-- jQuery -->
		
		<!-- jmpress plugin -->
		<script type="text/javascript" src="http://nostressgaming.fr/slidedown/js/jmpress.min.js"></script>
		<!-- jmslideshow plugin : extends the jmpress plugin -->
		<script type="text/javascript" src="http://nostressgaming.fr/slidedown/js/jquery.jmslideshow.js"></script>
		<script type="text/javascript" src="http://nostressgaming.fr/slidedown/js/modernizr.custom.48780.js"></script>
		<noscript>
			<style>
			.step {
				width: 100%;
				position: relative;
			}
			.step:not(.active) {
				opacity: 1;
				filter: alpha(opacity=99);
				-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=99)";
			}
			.step:not(.active) a.jms-link{
				opacity: 1;
				margin-top: 40px;
			}
			</style>
		</noscript>
    </head>
    <body>
   

			<section id="jms-slideshow" class="jms-slideshow">
				<div class="step" data-color="color-1">
					<div class="jms-content" ;>
						<h3>Legion</h3>
					<p>Plus de news bientot</p>
						 <!--<a class="jms-link" href="#">Read more</a>!-->
					</div>
			    </div>
			    <div class="step" data-color="color-2">
					<div class="jms-content" ;>
						<h3>Legion</h3>
					<p>Plus de news bientot</p>
				 <!--	<a class="jms-link" href="#">Read more</a>!-->
					</div>
			    </div>
				
				</div>
			</section>
       
		<script type="text/javascript">
			$(function() {
				
				var jmpressOpts	= {
					animation		: { transitionDuration : '0.8s' }
				};
				
				$( '#jms-slideshow' ).jmslideshow( $.extend( true, { jmpressOpts : jmpressOpts }, {
					autoplay	: true,
					bgColorSpeed: '0.8s',
					arrows		: false
				}));
				
			});
		</script>
    </body>


     



    <?php
    $req = $bdd->query("DELETE FROM `Temp_Liste_fichier`"); // On vide la table temp
    $dir_nom = './Article_Accueil'; // On dÃ©finit le dossier Ã  utiliser.
    $dir = new DirectoryIterator($dir_nom); // On ouvre le dossier.
     
    foreach($dir as $directory) { // Pour chaque Ã©lÃ©ment du dossier on crÃ©er une ligne dans la table Temp avec la date de modif et le nom.
     
    $Date=filemtime($directory->getPathName(). "");	
    $Lien=$directory->getPathName(). "";
    $req = $bdd->query("INSERT INTO `Temp_Liste_fichier`( `Date`,`Lien`) VALUES('$Date','$Lien')"); // crÃ©ation d'une BDD temp avec les nom de fichier
     
     
    }
    // RÃ©cupÃ©ration de chaque ligne de donnÃ©es, Ã  chaque itÃ©ration, tant qu'il y a des donnÃ©es On recupere tout le contenu de la table Temp
     
    $reponse = $bdd->query("SELECT * FROM `Temp_Liste_fichier` ORDER by `Date` DESC");
     
    // On rÃ©cupÃ¨re les nom des articles dans l'odre croissant d'anciÃ¨nnetÃ©
     
    while ($donnees = $reponse->fetch())
    {
    $Lien_aff= $donnees['Lien'];
    $Lien_bug1= $dir_nom.'/.';
    $Lien_bug2= $dir_nom.'/..';
    $Lien_bug3= $dir_nom.'/index.php';
    if ($Lien_aff != $Lien_bug1 and $Lien_aff != $Lien_bug2 and $Lien_aff != $Lien_bug3 ){// On vÃ©rifie que le lien est bien celui d'un vrai article.
     
     
    //On Incruste l'article dans l'odre
     
    echo('<div class="container">');
    echo('<div class="col-lg-12" >');
     
     
    include($Lien_aff);
     
    echo('</div>');
    echo('</div>');
     
    }
    }
     
    closedir($dir);
    ?>
     
     
    </body>
     
    <?php include("./Footer.php"); ?> <!-- Incrustation du header avec le menu, la BDD et bootstrap!-->
     
    
