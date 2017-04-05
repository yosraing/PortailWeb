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
    <title>Liste offres</title>
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
 <!--boutton-->
<link rel="stylesheet" href="../css/but.css">
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

document.location.href="addOffre1.php" 

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

<tbody>
<div class="wrap">

    <a class="btn-7" href="addOffre1.php"><span>Ajouter une offre</span></a>
   
  </div> 
<!--<button value="Ajouter une promotion" onclick="add()" ><img src="img/add.png"/></button>-->
 <table id='myTable' class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Photo</th>
        <th>Nom de l'hotel</th>
        <th>Nom de l'offre</th>
        <th>date Debut </th>
        <th>date fin </th>
        <th>Prix ancien</th>
        <th>Prix nouveau</th>
        <th>Description</th>
     <th></th>
        
    </tr>
    </thead>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "portail";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT offre.idOffre,Offre.nomOffre,Offre.dateDebut,Offre.dateFin,Offre.prixAncien,Offre.prixNouveau,Offre.description,Offre.idHotel,Offre.imageOffre,hotels.nomHotel FROM Offre,hotels where hotels.idHotel=Offre.idHotel ";
$result = $conn->query($sql);
$comp=0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
   


echo"<tr >";
    
        echo"<td>" ; print "<img  height=42 width=42 src=".$row[imageOffre].">";echo"</td>";
        echo '<td>  '. $row["nomHotel"]. ' </td>';
         echo '<td>  '. $row["nomOffre"]. ' </td><td>  '. $row["dateDebut"]. ' </td><td> ' . $row["dateFin"] . '</td><td> ' . $row["prixAncien"] .'</td><td>' . $row["prixNouveau"] .'</td><td>';
         echo "  ". $row["description"]. "</td> ";
        echo"</font>";

    
echo'<td>';

echo" <a class='btn-mod' href='modi.php?ID=".$row['idOffre']."'><span>Modifier offre</span></a>";


echo" <a class='btn-mod' href='images.php?ID=".$row['idOffre']."'><span>Modifier l'image</span></a>";
echo" <a class='btn-mod' href='sup.php?ID=".$row['idOffre']."'><span>Supprimer offre</span></a>";

echo'</td>';
        echo"</tr>";
     

     }
} else {
     echo "0 results";
}
echo"</table>";





$conn->close();
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