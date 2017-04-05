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

.chambre{
   width: 179px;
    height: 37px;

  background:transparent url(../img/bedroom.png);
  border:none;
  margin-left: 80%;
  margin-top: 90px;
  float: left;

}


</style>

    




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

    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->

<tbody>

<!-- Pour prendre le idC-->






<div class="tableaux">
 <table id='myTable' width="10%" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Photo</th>
       <th>Type de la chambre </th>
        <th>Prix </th>
        <th>Description</th>
     <th>Nom hotel</th>
   
        
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
$idHot= $_GET['ID'];
$sql="SELECT chambre.numeroChambre , chambre.typeChambre ,chambre.prixChambre,chambre.description,chambre.idHotel,chambre.imageChambre ,hotels.nomHotel FROM chambre ,hotels where hotels.idHotel=chambre.idHotel and hotels.idHotel='".$idHot."' ";
//$sql = "SELECT chambre.numeroChambre , chambre.typeChambre ,chambre.prixChambre,chambre.description,chambre.idHotel,chambre.imageChambre FROM chambre where idHotel='".$idHot."' ";
$result = $conn->query($sql);
$comp=0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
   


echo"<tr >";
    
        echo"<td>" ; print "<img  height=42 width=42 src=".$row[imageChambre].">";echo"</td>";
         echo '<td>  '. $row["typeChambre"]. ' </td><td>  '. $row["prixChambre"]. ' </td> ';
         echo '<td>  '. $row["description"]. ' </td>';
echo '<td>  '. $row["nomHotel"]. ' </td>';
 





     

     }
} else {
     echo "0 results";
}

 echo"</tr></table>";

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