<?php

Include("header.html");
Include("conecBDD.php");

$conexio = new mysqli($ServerName,$rootName,$password,$BDDName);

if ($conexio){

$consulta = "SELECT id, nom from Camiseta";
$resultat = $conexio -> query($consulta);

  if ($resultat) {

    while ($row = $resultat -> fetch_array()) {
      $nom = $row['nom'];
      $id = $id['id'];
      ?>
      <div>
        <br>
        <table>
          <tr> <?php echo $nom;?> </tr><br>
        </table>
          <a href="detalls.php?id=<?php echo $row['id'];?>">
            <input type="button" value="Detalles del producto"/>
          </a>
          <br>
      </div>

      <?php
    }
  }
}

?>
