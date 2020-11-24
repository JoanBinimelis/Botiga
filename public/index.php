<?php

include("header.html");
$inc = include("../config/conecBDD.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <?php

        $conexio = new mysqli($ServerName,$rootName,$password,$BDDName);

      if ($conexio->connect_error){
        die("Connection failed: " . $conexio->connect_error);
      }

      $consulta = "SELECT id, Nom, Preu from Camiseta";
      $resultat = $conexio->query($consulta);

        if ($resultat -> num_rows > 0) {


      while ($row = $resultat->fetch_assoc()) {
        $nom = $row['Nom'];
        $id = $row['id'];
        $preu = $row['Preu'];

        ?>

            <div class="card">
              <img src="/img/<?php echo $id;?>.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $nom;?></h5>
                <p><?php echo $preu;?>€</p>
                <a href="detalls.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Detalls</a>
              </div>
            </div>
            <?php

          } else {
            echo "0 results";
          }
            $conexio->close();
            ?>

     </div>
   </body>
  </html>
<?php

  }

?>
