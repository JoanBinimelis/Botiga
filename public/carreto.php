<?php

Include("header.html");
session_start();

if(!isset ($_SESSION['carreto'])){
  $_SESSION['carreto'] = array();
  $_SESSION['count'] = array();
}

if(isset ($_GET ['nom'])){
  $nom = $_GET['nom'];
}
else{
  $nom = "";
}

if($nom != ""){
  $cercaNom = array_search($nom, $_SESSION["carreto"]);
    if($cercaNom === FALSE){
      $_SESSION['carreto'][] = $nom;
      $_SESSION['count'][] = 1;
    }
    else{
      $_SESSION['count'][$cercaNom] += 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head></head>
  <body>
    <h1>Carretó</h1>
    <ul>
      <?php

      $long = count($_SESSION['carreto']);

      for($i = 0; $i < $long; $i++){
        echo "<li>"."Nom: ".$_SESSION['carreto'][$i]." -- "." Quantitat: ".$_SESSION['count'][$i]."</li>";
      }
       ?>

       <a href="index.php">
         <input type="button" value="Segueix amb les compres"/>
       </a>

       <form action='tancaSessio.php'>
          <input type="submit" value="Finalitza les compres"/>
       </form>
    </ul>
  </body>
</html>
<?php
?>
