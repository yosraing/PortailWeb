<?php 
include("dbconfig.php");
session_start();
if(!isset($_SESSION['login_user']))
  {
 header("Location: ../Session/login.php");
  }
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Modifier promotion</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/grid.css">
    <!--Css pour le login ajouté à la fin-->
    <link rel="stylesheet" href="../css/style.css">
 <link id="bs-css" href="../css/bootstrap-cerulean.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.2.1.js"></script>
<!--Css pour le login-->
 <link rel="stylesheet" href="../css/reset.css">
<style>

.btadd{
   width: 179px;
    height: 37px;

  background:transparent url(../img/add.png);
  border:none;
  margin-left: 800px;
  margin-top: 90px;
  float: left;

}


</style>

    <!--[if lt IE 9]>
    <html class="lt-ie9">
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a> 
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
 <!-- redirection vers le lien ajouter une promotion-->
<script type="text/javascript">
function add()
{

document.location.href="addPromotion1.php" 

}
</script>



    <script src='../js/device.min.js'></script> 
</head>
<!-- ajouté pour le login-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../js/index.js"></script>
<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>

        <div id="stuck_container" class="stuck_container">
            <div class="container">

                <div class="brand">
                    <h1 class="brand_name">
                    <a href="../main.html"> <img  width=75% src="../logo-hotel.png">
                    </a>
                    </h1>
                </div>

                <nav class="nav">
                    <ul class="sf-menu">
                                       <li>
                        <a href="../Hotels/listeHotels.php">Hotels</a>
                    </li>

                    <li>
                        <a href="../Chambres/listeChambres.php">Chambres</a>
                    </li>
                  <li>
                        <a href="listePromotions.php">Promotions</a>
                    </li>
                        <li>
                        <a href="../Offres/listeOffres.php">Offres</a>
                    </li>
                    <li>
                        <a href="../Messages/lsiteMessages.php">Messages</a>
                        
                    
                    <li>
                        <a href="../Maps/maps.php">Maps</a>
                    </li>
<li>
                        <a href="../ForumAdmin/Forum.php">Forum</a>
                    </li>
                   
                   
                </ul>
            </nav>            
        </div>
<p align="right">
         <?php
  
  if(isset($_SESSION['login_user']))
  {
  $login_session=$_SESSION['login_user'];
  echo '<h1>Welcome '.$login_session.'</h1>';
  }
  ?>
  <a href="../Session/logout.php">Logout</a>
</div></p>
    
    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    
<?php
// on se connecte à notre base
$base = mysql_connect ('localhost', 'root', 'root');
mysql_select_db ('portail', $base) ;
?>


<script type="text/javascript">
function hello()
{ 
document.location.href="listepromotions.php" 
}
</script>


<?php

echo"<br>";
echo"</br>";
//echo'<a href="image_blob/index.php?ID='.$row["idP"].'"test</a>';

// On commence par récupérer les champs 
if(isset($_POST['pic']))      $image=$_POST['pic'];
else      $image="";
if(isset($_POST['nomP']))      $nomP=$_POST['nomP'];
else      $nomP="";

if(isset($_POST['prixAncien']))      $prixAncien=$_POST['prixAncien'];
else      $prixAP="";

if(isset($_POST['prixNouveau']))      $prixNouveau=$_POST['prixNouveau'];
else      $prixNP="";

if(isset($_POST['description']))      $desP=$_POST['description'];
else      $desP="";
if(isset($_POST['dateDebut']))      $dateDebPro=$_POST['dateDebut'];
else      $dateDebPro="";
if(isset($_POST['dateFin']))      $dateFin=$_POST['dateFin'];
else      $dateFin="";

if(isset($_POST['idHotel']))      $idHotel=$_POST['idHotel'];
else      $idHotel="";
if(isset($_POST['idP']))      $idp=$_POST['idP'];
 $filename=$_FILES['pic']['name'];  
 

$idurl = $_GET['ID']; 
//$nom="images/".$filename;


 //print_r($image);
//$sql = "INSERT INTO Produit (nomP, prixP, desP,typeP,imageP,id) VALUES ('$nomP', '$prixP', '$desP','$typeP','$nom','$id')";
$sql = "UPDATE Promotion SET nomPromotion='$nomP', dateDebut='$dateDebPro', dateFin='$dateFin',prixAncien='$prixAncien',prixNouveau='$prixNouveau',description='$desP',idHotel='$idHotel' WHERE idPromotion=$idurl";
// on insere le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

// on ferme la connexion à la base
mysql_close();
echo"<center>";
echo"<FONT color='white'>Modification reusite !</font>";
echo"</center>";
echo"<br>";
echo"<br>";
echo"<center>";
echo "<input type='button' class='btn'  onclick= 'hello();' value='retour'>";
echo"</center>";
?>





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