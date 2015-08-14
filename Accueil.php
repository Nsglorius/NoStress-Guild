    <?php include("./Header.php"); ?> <!-- Incrustation du header avec le menu, la BDD et bootstrap!-->
     
    <!-- Flux d'actualitÃ© automatique avec le contenue du fichier Article_Accueil!-->

    
    <body>



<style>

.slider{
width:90%;
height:300px;
margin:20px auto;
background:white;
}
.imageslid {
background-size: cover;
width:90%;
height: 300px;
}

</style>


  <div class="slider">
    <div class="imageslid" style="background-image:url(http://www.millenium.org/images/contenu/actus/wow/fanarts/wow_fanart15122011_hd_1.jpg)"></div>
    <div class="imageslid" style="background-image:url(http://i.ytimg.com/vi/StTEG-YtyEs/maxresdefault.jpg)"></div>
    <div class="imageslid" style="background-image:url(http://i.ytimg.com/vi/StTEG-YtyEs/maxresdefault.jpg)"></div>

  </div>

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="http://nostressgaming.fr/slick/slick.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.slider').slick({
  dots: true,
autoplaySpeed:5000,
autoplay:true,
fade: true,
});
});
  </script>


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
     
    
