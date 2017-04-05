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
   <?php

$connect = mysql_connect('localhost','root','root') or die ("erreur de connexion");
mysql_select_db('portail',$connect) or die ("erreur de connexion base");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = $_POST["name"];
    $password = ($_POST["password"]);

     if ($name == '' || $password == '') {
        $msg = "You must enter all fields";
    } else {
        $sql = "SELECT idPersonne,idVisiteur FROM personne WHERE emailPersonne='$emailPersonne' and password='$password'";
        $query = mysql_query($sql);
$type=$row["idVisiteur"];
        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
       
;
        if (mysql_num_rows($query) > 0) {
        //echo"test";
            //header('Location: test.html');
      if($type==1)

header("location: hotel.php");

else if($type==2)
header("location: Promotions/listePromotions.php");

            exit;
        }
        else 

        $msg = "Username and password do not match";
          
    }
}

 
mysql_close ();
?>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <section class="well well__offset-3">
            <div class="container">
               <!-- <h2><em>Login</em></h2>-->
  <form class="login">
  
  <fieldset>
    
    <legend class="legend">Login</legend>
    
    <div class="input">
        <input type="text" name="name" id="name" type="text" size="30"  />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>
    
    <div class="input">
        <input type="password" name="password" id="password" type="password" size="30"/>
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit"  alt="Submit" title="Submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
   <br>
    <a href="" > Mot de passe oublié</a>
    <br>
    <a href="" > S'inscrire</a>
  </fieldset>
  
  <div class="feedback">
    login successful <br />
    redirecting...
  </div>
  
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
        <div class="tm"><a href="#"><img src="images/TM_logo.png" alt=""></a></div>
    </footer>
</div>

<script src="js/script.js"></script>
</body>
</html>