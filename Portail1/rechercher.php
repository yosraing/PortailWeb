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
<!--recherche par etoile-->
<script>
$(document).ready(function(){
$('.rating span').click(function() {

  var $nbr = $(this).attr('id');
  alert($nbr);
})})

</script>



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
<!--style etoile-->
<style type="text/css">
.rating {
  float: left;
}

.rating span {
  font-size: 25px;
  cursor: pointer;
  float: right;
}

.rating span:hover,
.rating span:hover ~ span {
  color: red;
}
</style>
<script type="text/javascript">
$('.rating span').click(function() {
  var $nbr = $(this).attr('id');
  alert($nbr);
})

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
                <h4><em>Rechercher un hotel</em></h4>
               
<br>

<form   method="POST" class='recherch-form'>
reherche un hotel par son nom <input type="text" name="non"/>

 <p>Recherche par nombre detoiles </p>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

<div class="rating">
  <span id="5" class="glyphicon glyphicon-star"></span>
  <span id="4" class="glyphicon glyphicon-star"></span>
  <span id="3" class="glyphicon glyphicon-star"></span>
  <span id="2" class="glyphicon glyphicon-star"></span>
  <span id="1" class="glyphicon glyphicon-star"></span>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        



<input type="submit" value="rechercher"/>
</form>

<br>

<?php
$conn = new mysqli(localhost, root, root, portail);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['non']))      $nomHot=$_POST['non'];
else      $nomHot="";

if($_POST['non']!="")
{ echo"tesssst";

//recupération de tous les enregistrements de la table hotel
$sql = "SELECT * FROM hotels where '".$nbr."' OR nomHotel like '%" . $_POST["non"]. "%' ";
$result = $conn->query($sql);
$comp=0;
?>
<table id='myTable' class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Photo</th>
        <th>Nom hotel</th>
        <th>Emplacement </th>
        <th>Nombre d'etoiles</th>
        <th>Description</th>
     
        
    </tr>
    </thead>

<?php
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
   


echo"<tr id=". $row["idHotel"].">";
    
        echo"<td>" ; print "<img  height=42 width=42 src=".$row[imageHotel].">";echo"</td>";
         echo '<td>  '. $row["nomHotel"]. ' </td><td>  '. $row["emplacement"]. ' </td><td> ' . $row["nbrEtoile"] . '</td>';
         echo " <td> ". $row["description"]. "</td> ";
         
        echo"</font>";

    

        echo"</tr>";
     

     }
} else {
     echo "0 results";
}
echo"</table>";



}



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
            <div class="copyright">© <span id="copyright-year"></span> 
                <a href="#">Privacy Policy</a>
            </div>
        </div>
        <div class="tm"><a href="#"><img src="images/TM_logo.png" alt=""></a></div>
    </footer>
</div>

<script src="../js/script.js"></script>
</body>

</html>