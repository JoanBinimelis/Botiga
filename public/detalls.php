<?php

include("header.html");
$inc = include("../config/conecBDD.php");

$conexio = new mysqli($ServerName,$rootName,$password,$BDDName);

$id = (int)$_GET['id'];

if($conexio){

  $consulta = "SELECT Nom, Preu, Descripcio from Camiseta where id = $id";
  $resultat = $conexio->query($consulta);

  if($resultat){
    while($row = $resultat->fetch_array()){
      $preu = $row['Preu'];
      $desc = $row['Descripcio'];
      $nom = $row['Nom'];
      ?>

      <html>
        <head>
          <style>

              table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                  }

              td, th {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
                  }

          </style>
        </head>
        <body>
          <h1>Detalls de la camiseta</h1>
          <table>
            <tr>
              <th>Preu</th>
              <th>Descripcio</th>
              <th>Imatge</th>
            </tr>
            <tr>
              <td><?php echo $preu; ?></td>
              <td><?php echo $desc; ?></td>
              <td><img src="/img/<?php echo $id ?>.jpg" height="200"></td>
            </tr>
          </table>
          <a href="carreto.php?nom=<?php echo $row['Nom'];?>"></a>
          <br>
          <a href="index.php">
            <input type="button" value="Torna"/> </a>
            <br>
        </body>
      </html>

      <?php

    }
  }
}

 ?>
