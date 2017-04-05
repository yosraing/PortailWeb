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
    <title>Ajouter offre</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="i../mages/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/grid.css">
    <!--Css pour le login ajouté à la fin-->
    <link rel="stylesheet" href="../css/style.css">
 <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.2.1.js"></script>
<!--Css pour le login-->
 <link rel="stylesheet" href="css/reset.css">


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
                        <a href="..Hotels/listeHotels.php">Hotels</a>
                    </li>

                    <li>
                        <a href="../Chambres/listeChambres.php">Chambres</a>
                    </li>
                  <li>
                        <a href="../Promotions/listePromotions.php">Promotions</a>
                    </li>
                        <li>
                        <a href="listeOffres.php">Offres</a>
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
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Ajouter offre</em></h2>
 <form method="POST" name="frmupload" action="addOffre.php" enctype= "multipart/form-data" >
    <legend class="legend">Ajouter offre</legend><br>
<center>

<!-- <input type="text" name="id" size="20" value="id" maxlength="35"> -->
Image offre :<input type="file"  name="pic" multiple="multiple"/><br/><br/>
 
 <div class='input'>
 <br>
 
 <input type="hidden" name="idP" size="20" maxlength="35"><br>
Nom de l'offre : <input type="text" name="nomP" size="20" maxlength="35"><br>
Description de l'offre : <input type="text" name="description" ><br>
Prix ancien de l'offre : <input type="text" name="prixAncien" size="20"  maxlength="70"><br> 
Prix nouveau de l'offre : <input type="text" name="prixNouveau" size="20"  maxlength="70"><br> 
Date Debut de ll'offre : <input type="text" name="dateDebut" size="20"  maxlength="70"><br> 
Date fin de l'offre : <input type="text" name="dateFin" size="20"  maxlength="70"><br> 
<!--Id hotel: <input type="text" name="idHotel" size="20"  maxlength="70"><br> 
<!-- Ajouter nom hotel-->
Nom de l'hotel
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "portail";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nomHotel ,idHotel FROM hotels";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<select name ='idHotel'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option  value=". $row["idHotel"].">" . $row["nomHotel"]. " </option>";
    }
    echo"</select><br>";
} else {
    echo "0 results";
}
$conn->close();
?>



<input type="submit" class="btn"  value="Envoyer" name="envoyer">

</center>

</form>

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
        <div class="tm"><a href="#"><img src="i../mages/TM_logo.png" alt=""></a></div>
    </footer>
</div>

<script src="../js/script.js"></script>
</body>
</html>