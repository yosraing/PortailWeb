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
    <title>Ajouter promotion</title>
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
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Modifier une offre</em></h2>
 <script type="text/javascript">
 function getUrlVars() {
var vars = {};
var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
vars[key] = value;
});
return vars;
}

</script>
<script type="text/javascript">
function mod()
{ var first = getUrlVars()["ID"];
document.location.href="modifier.php?ID="+first; 
}
</script>

<body>
 <DIV id= "logo"></DIV> 
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

$idurl = $_GET['ID']; 


$sql = "SELECT * FROM Offre where idOffre=$idurl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
      
         echo'<form method="POST" name="frmupload" action="modifier.php?ID='.$row["idOffre"].'" enctype= "multipart/form-data" >';
           echo'  <legend class="legend">Modifier offre</legend>';
         echo"  <div class='input'>";
         echo"<center>";
       print "<img   width=100  src=".$row[imageOffre].">";  
       echo"</center>"; 
    //echo'Modifier Image Parfum :<input type="file"  name="pic" multiple="multiple"/><br/>';
    //echo '<img height="42" width="42" src="data:image/jpeg;base64,'.base64_encode( $row["imageP"]).'"/>';
          echo "<br> Nom Offre: <input type='text'  name ='nomP' value='". $row["nomOffre"]. " '/><br>
          date Debut : <input type='text' name='dateDebut'value='" . $row["dateDebut"] . "'/> 
          <br>
          date Fin : <input type='text' name='dateFin'value='" . $row["dateFin"] . "'/> 

          <br>Prix Ancien: <input type='text' name='prixAncien' value='" . $row["prixAncien"] ." '/><br>
          <br>Prix nouveau: <input type='text' name='prixNouveau' value='" . $row["prixNouveau"] ." '/><br>
           <br>description: <input type='text' name='description' value='" . $row["description"] ." '/><br>";

echo"Nom hotel :"; 





//echo'<input name="idProduit" type="text" value="'.$row["idP"].'" />';

     echo"</center>";
     }
   

} else {
     echo "0 results";
}



$conn->close();
?>  

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
echo"<select name ='idHotel'>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option  value=". $row["idHotel"].">" . $row["nomHotel"]. " </option>";
    }
} else {
    echo "0 results";
}
echo"</select><br>";
$conn->close();
?>




<input type='submit' class='btn'  name='envoyer'  value='Modifier cette offre'>
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