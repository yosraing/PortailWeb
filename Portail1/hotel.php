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
<style>

div.iconnechambre input
{
 cursor:pointer;
    width: 100px;
    height: 100px;
    border: none;
  background:transparent url(img/bed.png) no-repeat;
  border:none;
  
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
 <!-- redirection vers le lien liste chambre-->
<script type="text/javascript">
function chambre()
{
//Afficher l'id du hotel cliqué 
          $('input[type=button]' ).click(function() {
              var bid, trid; // Declare variables if you don't use var 
                             // you will bind bid and trid 
                             // to the window, since you make them global variables.
              bid = (this.id) ; // button ID 
              trid = $(this).closest('tr').attr('id'); // table row ID 
              //alert(trid);
              document.location.href="chambre.php?ID="+trid; 
          });


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

<tbody>

 <table id='myTable' class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Photo</th>
        <th>Nom hotel</th>
        <th>Emplacement </th>
        <th>Nombre d'etoiles</th>
        <th>Description</th>
        <th> Les chambres de cet hotel</th>
        
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

$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);
$comp=0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
   


echo"<tr id=". $row["idHotel"].">";
    
        echo"<td>" ; print "<img  height=42 width=42 src=".$row[imageHotel].">";echo"</td>";
         echo '<td>  '. $row["nomHotel"]. ' </td><td>  '. $row["emplacement"]. ' </td><td> ' . $row["nbrEtoile"] . '</td>';
         echo " <td> ". $row["description"]. "</td> ";
         echo'<td><div class="iconnechambre"><input type=button onclick="chambre()" /><div></td>';

        echo"</font>";

    

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