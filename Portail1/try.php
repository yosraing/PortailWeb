<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <!--Css pour le login ajouté à la fin-->
    <link rel="stylesheet" href="css/style.css">
 <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
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
 
    <script src='js/device.min.js'></script> 
</head>
<!-- ajouté pour le login-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
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
                        <a href="index-2.html">Hotels</a>
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
                        <a href="maps.html">Maps</a>
                    </li>
<li>
                        <a href="Forum.php">Forum</a>
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
 <DIV id= "add"><button class="btadd"  onclick= 'add();'/></DIV>  
 <table id='myTable' class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Photo</th>
        <th>Id</th>
        <th>Parfum </th>
        <th>Prix</th>
        <th>description</th>
        <th>type</th>
        <th>Catégorie</th>
        <th>Gestion</th>
        
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

$sql = "SELECT * FROM Promotion";
$result = $conn->query($sql);
$comp=0;
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
   


echo"<tr >";
    
        echo"<td>" ; print "<img  height=42 width=42 src=".$row[imagePromotion].">";echo"</td>";
         echo '<td>  '. $row["nomPromotion"]. ' </td><td>  '. $row["dateDebut"]. ' </td><td> ' . $row["dateFin"] . '</td><td> ' . $row["prixAncien"] .'</td><td>' . $row["prixNouveau"] .'</td><td>';
         echo " description: ". $row["description"]. "</td> ";
        echo"</font>";

    
echo'<td>';

echo" <a href='modi.php?ID=".$row['idP']."'><img src='img/edit.png' /></a>";


echo" <a href='images.php?ID=".$row['idP']."'><img src='img/photo.png' /></a>";
echo" <a href='sup.php?ID=".$row['idP']."'><img src='img/delete.png' /></a>";

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

<script src="js/script.js"></script>
</body>
</html>