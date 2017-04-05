<?php 
include("dbconfig.php");
session_start();
if(!isset($_SESSION['login_user']))
  {
  header("Location: Session/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Liste des hotels </title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/grid.css">
    <!--Css pour le login ajouté à la fin-->
    <link rel="stylesheet" href="css/style.css">
 <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
<!--Css pour le login-->
 <link rel="stylesheet" href="css/reset.css">





    <script src='../js/device.min.js'></script> 
</head>
<!-- ajouté pour le login-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../js/index.js"></script>
<body  onload="NotationSystem();">
<div class="page">
<!-- Pour la recherche par prix -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    
<script src="script.js"></script>
<!-- Pour la recherche par etoiles-->


<script>
<!-- 
StarOutUrl=   'img/StarOut.gif';    //image par défaut
StarOverUrl=  'img/StarOver.gif';   //image d'une étoile sélectionnée
StarBaseId=   'Star';       //id de base des étoiles
NbStar=     5;         //nombre d'étoiles

LgtStarBaseId=StarBaseId.lastIndexOf('');

function NotationSystem() {
  for (i=1;i<NbStar+1;i++) {
    var img     =document.getElementById('Star'+i);
      
    img.onclick   =function() {alert('Vous avez donné la note de '+Name2Nb(this.id)+'.');};
    //Réaction lors du clic sur une étoile
    //Evidemment, il faudrait compléter cette fonction pour la rendre vraiment utile.
    //Par exemple, envoyer la note dans une base de donnée via un XMLHttpRequest.
    
    img.alt     ='Donner la note de '+i;
    //Texte au survol
    
    img.src     =StarOutUrl;
    img.onmouseover =function() {StarOver(this.id);};
    img.onmouseout  =function() {StarOut(this.id);};
  }
}

function StarOver(Star) {
  StarNb=Name2Nb(Star);
  for (i=1;i<(StarNb*1)+1;i++) {
    document.getElementById('Star'+i).src=StarOverUrl;
  }
}

function StarOut(Star) {
  StarNb=Name2Nb(Star);
  for (i=1;i<(StarNb*1)+1;i++) {
    document.getElementById('Star'+i).src=StarOutUrl;
  }
}

function Name2Nb(Star) {
  //Le survol d'une étoile ne nous permet pas de connaître directement son numéro
  //Cette fonction extrait donc ce numéro à partir de l'Id
  StarNb=Star.slice(LgtStarBaseId);
  return(StarNb);
} 
-->
</script>
















    <!--========================================================
                              HEADER
    =========================================================-->
     <header>

        <div id="stuck_container" class="stuck_container">
            <div class="container">

                <div class="brand">
                    <h1 class="brand_name">
                          <a href="index.html"> <img  width=75% src="logo-hotel.png">
                    </a>
                    </h1>
                </div>

                <nav class="nav">
                    <ul class="sf-menu">
                      <li>
                        <a href="hotel.php">Hotels</a>
                    </li>
                        <li>
                        <a href="index-4.html">Rechercher</a>
                    </li>
                    <li>
                        <a href="index-1.html">Nouveautés</a>
                        <ul>
                            <li>
                                <a href="#">Offres</a>
                            </li>
                            <li>
                                <a href="#">Promotions</a>
                                <ul>
                                    <li>
                                        <a href="#">Lorem</a>
                                    </li>
                                    <li>
                                        <a href="#">Dolor</a>
                                    </li>
                                    <li>
                                        <a href="#">Sit amet</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Vivamus eget nibh</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="index-3.html">Maps</a>
                    </li>
<li>
                        <a href="Forum/Forum.php">Forum</a>
                    </li>
                    <li>
                        <a href="index-4.html">Contacts</a>
                    </li>
                   
                </ul>
            </nav>            
        </div>

<!-- ajouté pour les sessions-->
<p align="right">
         <?php
  
  if(isset($_SESSION['login_user']))
  {
  $login_session=$_SESSION['login_user'];
  echo '<h1>Welcome '.$login_session.'</h1>';
  }
  ?>
  <a href="Session/logout.php">Logout</a>
</div></p>
    
    </header>




    <!--========================================================
                              CONTENT
    =========================================================-->

  <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Rechercher un hotel</em></h2>
                <p>Recherche par nombre detoiles </p>
<br>
              <img id="Star1" src="StarOut.gif" /><img id="Star2" src="StarOut.gif" />
<img id="Star3" src="StarOut.gif" /><img id="Star4" src="StarOut.gif" />
<img id="Star5" src="StarOut.gif" />
<br>
Rechercher par prix
<div>
  <span id="app_min_price" ></span>
  <span id="app_max_price" style="float: right"></span>
  <br /><br />
  <div id="slider_price"></div>
  <br />
  <span id="number_results"></span> results found.
</div>
              </div>
            </section>
          </main>

  <!--========================================================
                              FOOTER
    =========================================================-->
    <footer>
        <div class="container">
            <ul class="socials">
                <li><a href="#" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-tumblr"></a></li>
                <li><a href="#" class="fa fa-google-plus"></a></li>
            </ul>
            <div class="copyright">© <span id="copyright-year"></span> |
                <a href="#">Privacy Policy</a>
            </div>
        </div>
        <div class="tm"><a href="#"><img src="images/TM_logo.png" alt=""></a></div>
    </footer>
</div>

<script src="../js/script.js"></script>
</body>
</html>