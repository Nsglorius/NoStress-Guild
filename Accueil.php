 <?php include("./Header.php"); ?> <!-- Incrustation du header avec le menu, la BDD et bootstrap!-->
 
<!-- Flux d'actualitÃ© automatique avec le contenue du fichier Article_Accueil!-->
 
 
<body>
 
 
 
<style>
 
 
.imageslid {
background-size: cover;
width:90%;
height: 400px;
}
.docslid {
align:center;
 vertical-align:middle;
 background-color:#232323;
 height: 200px;
 width:400px;
 margin-top:100px;
 margin-left:50px;
 padding-top:2px; 
 padding-bottom:2px; 
 padding-right:5px;
 padding-left:5px;
 opacity:0.80;
}
</style>
 
 
<div class="slider">
<div class="imageslid" style="background-image:url(http://nostressgaming.fr/Image/Wow/Photo_slieder_legion.png)">
<div class="docslid">
 
<h1>World Of Wacraft</h1>
<H3>Legion</H3>
 <button type="button" class="btn btn-default"; opacity:1; onclick="window.open('http://eu.battle.net/wow/fr/legion/'); return false";>Plus d'information</button>

</div>
</div>

<div class="imageslid" style="background-image:url(http://nostressgaming.fr/Image/Wow/photosliderGT.png)">
<div class="docslid">
 
<h1>Hearthstone</h1>
<p> Grand tournoi</p>
<button type="button" class="btn btn-default"; opacity:1; onclick="window.open('http://eu.battle.net/hearthstone/fr/blog/'); return false";>Plus d'information</button>

</div>
</div>

<div class="imageslid" style="background-image:url(http://i.ytimg.com/vi/E1tzJ9lDY7Y/maxresdefault.jpg)">
<div class="docslid">
  <h1>Patch note HOTS</h1>
<p>Kharazim,Les Sanctuaires infernaux et divers équilibrage</p>
<button type="button" class="btn btn-default"; opacity:1; onclick="window.open(' http://eu.battle.net/heroes/fr/blog/19818499/royaume-public-de-test-notes-de-mise-%C3%A0-jour-14-ao%C3%BBt-11-08-2015'); return false";>Plus d'information</button>
</div>
</div>

<div class="imageslid" style="background-image:url(http://blog.askmrrobot.com/wp-content/uploads/2015/01/Avoidable_Mouseover.png)">
<div class="docslid"> 
<h1>Log de raid </h1>
<p>Voici tout les logs de la guilde sur Ask Mr Robot</p>
<button type="button" class="btn btn-default"; opacity:1; onclick="window.open('http://www.askmrrobot.com/wow/combatlog/guild/eu/culte_de%20la%20rive%20noire/No%20STress";>Plus d'information</button>
</div>
</div>

</div>
 
 

 
 
<?php
$req = $bdd->query("DELETE FROM `Temp_Liste_fichier`"); // On vide la table temp
$dir_nom = './Article_Accueil'; // On dÃ©finit le dossier Ã utiliser.
$dir = new DirectoryIterator($dir_nom); // On ouvre le dossier.
 
foreach($dir as $directory) { // Pour chaque Ã©lÃ©ment du dossier on crÃ©er une ligne dans la table Temp avec la date de modif et le nom.
 
$Date=filemtime($directory->getPathName(). "");	
$Lien=$directory->getPathName(). "";
$req = $bdd->query("INSERT INTO `Temp_Liste_fichier`( `Date`,`Lien`) VALUES('$Date','$Lien')"); // crÃ©ation d'une BDD temp avec les nom de fichier
 
 
}
// RÃ©cupÃ©ration de chaque ligne de donnÃ©es, Ã chaque itÃ©ration, tant qu'il y a des donnÃ©es On recupere tout le contenu de la table Temp
 
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
 
<script type="text/javascript">
$(document).ready(function(){
$('.slider').slick({
dots: true,
autoplaySpeed:5000,
autoplay:true,
fade: true,
infinite:true,
pauseOnHover:true,
arrows: false,
});
});
</script>
 
</body>
 
<?php include("./Footer.php"); ?> <!-- Incrustation du header avec le menu, la BDD et bootstrap!-->
 
 
