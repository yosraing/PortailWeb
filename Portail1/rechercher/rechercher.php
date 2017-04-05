<!DOCTYPE html>
<html lang="en">
<head>
    <title>Liste des hotels </title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/grid.css">
    <!--Css pour le login ajouté à la fin-->
    <link rel="stylesheet" href="../css/style.css">
 <link id="bs-css" href="../css/bootstrap-cerulean.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.2.1.js"></script>
<!--Css pour le login-->
 <link rel="stylesheet" href="../css/reset.css">





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
StarOutUrl=   'StarOut.gif';    //image par défaut
StarOverUrl=  'StarOver.gif';   //image d'une étoile sélectionnée
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
                <h4><em>Rechercher un hotel</em></h4>
               
<br>

<form   method="POST" class='recherch-form'>
reherche un hotel par son nom <input type="text" name="non"/>

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
{
//recupération de tous les enregistrements de la table hotel
$sql = "SELECT * FROM hotels where nomHotel like '%" . $_POST["non"]. "%' ";
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