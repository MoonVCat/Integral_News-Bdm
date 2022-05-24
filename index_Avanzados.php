<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$Fecha1 = $_GET["Fecha1"];
$Fecha2 = $_GET["Fecha2"];

$clave1 = $_GET["clave1"];
$clave2 = $_GET["clave2"];
$clave3 = $_GET["clave3"];

$cate1 = $_GET["cate1"];
$cate2 = $_GET["cate2"];
$cate3 = $_GET["cate3"];

$urgente = $_GET["urgente"];

?>

<div class="content">

  <div class="preguntas">

    <div class="preguntas">
      <figure class="text-center">
        <h1>Noticias</h1>
      </figure>

      <div class="card-deck">
        <?php

        $categNew = "SELECT * FROM NEWS_CATEGORIES WHERE DESCRIPTION LIKE '$cate1' OR DESCRIPTION LIKE '$cate2' OR DESCRIPTION LIKE '$cate3'";
        $resCateN = $mysqli->query($categNew);

        $claveNew = "SELECT * FROM NEWS_CLAVE WHERE NEWS_CLAVE LIKE '$clave1' AND NEWS_CLAVE LIKE '$clave2' AND NEWS_CLAVE LIKE '$clave3'";
        $resClaveN = $mysqli->query($claveNew);

        $first = true;
        $second = true;
        $third = true;
        $idNoticia = 0;
        $idNoticia1 = 0;
        $idNoticia2 = 0;

        while ($row3 = mysqli_fetch_assoc($resCateN)) {

          if (true === $first) {

            $first = false;
            $idNoticia = $row3['NEWS_ID'];
            continue;
          } if (true === $second) {

            $second = false;
            $idNoticia1 = $row3['NEWS_ID'];
            continue;
          } if (true === $third) {

            $third = false;
            $idNoticia2 = $row3['NEWS_ID'];
            continue;
          }
        }

        $first = true;
        $second = true;
        $third = true;
        $idNoticia3 = 0;
        $idNoticia4 = 0;
        $idNoticia5 = 0;

        while ($row4 = mysqli_fetch_assoc($resClaveN)) {

          if (true === $first) {

            $first = false;
            $idNoticia3 = $row4['NEWS_ID'];
            continue;
          } if (true === $second) {

            $second = false;
            $idNoticia4 = $row4['NEWS_ID'];
            continue;
          } if (true === $third) {

            $third = false;
            $idNoticia5 = $row4['NEWS_ID'];
            continue;
          }
        }

        if ($idNoticia == 0 && $idNoticia1 != 0 && $idNoticia2 != 0) {

          $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' AND NEWS_ID = '$idNoticia1'  OR NEWS_ID = '$idNoticia2' AND NEW_STATUS = 'Publicada'";
          $resNews1 = $mysqli->query($noticias1);

        } else if ($idNoticia != 0 || $idNoticia1 == 0 || $idNoticia2 != 0) {

          $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' AND NEWS_ID = '$idNoticia' OR NEWS_ID = '$idNoticia2' AND NEW_STATUS = 'Publicada'";
          $resNews1 = $mysqli->query($noticias1);

        } else if ($idNoticia != 0 || $idNoticia1 != 0 || $idNoticia2 == 0) {

          $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' AND NEWS_ID = '$idNoticia' OR NEWS_ID = '$idNoticia1'  AND NEW_STATUS = 'Publicada'";
          $resNews1 = $mysqli->query($noticias1);

        } else if($idNoticia != 0 && $idNoticia1 != 0 && $idNoticia2 != 0){

          $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' OR NEWS_ID = '$idNoticia' OR NEWS_ID = '$idNoticia1' OR NEWS_ID = '$idNoticia2' AND NEW_STATUS = 'Publicada'";
          $resNews1 = $mysqli->query($noticias1);

        } else if ($idNoticia == 0 && $idNoticia1 == 0 && $idNoticia2 == 0){

          $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' AND NEW_STATUS = 'Publicada'";
          $resNews1 = $mysqli->query($noticias1);
        } 


        while ($row = mysqli_fetch_assoc($resNews1)) {

          $idNew = $row['NEWS_ID'];

          $categ = "SELECT DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE '$idNew' = `NEWS_ID`";
          $category = $mysqli->query($categ);
          $i = mysqli_fetch_array($category);
          $color = $i['COLOR'];
          $categ = NULL;

          $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE '$idNew' = `NEWS_ID`";
          $imagen = $mysqli->query($img);
          $a = mysqli_fetch_array($imagen);
          $img = NULL;

        ?>

          <div style="background-color:<?php echo $color ?>" class="row g-0 bg-light position-relative">

            <div style="background-color:<?php echo $color ?>" class="col-md-6 mb-md-0 p-md-4">
              <img src="<?php echo $a['NEWS_TITLE']; ?>" class="w-40" width="200" height="200" alt="...">
            </div>
            <div style="background-color:<?php echo $color ?>" class="col-md-6 p-4 ps-md-0">
              <?php
              $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = '$idNew'";
              $resCate = $mysqli->query($newCate);
              while ($cate = $resCate->fetch_assoc()) {
              ?>
                <span style="background-color:<?php echo $cate['COLOR'] ?>;align-content: space-around; font-size: 90%;font-weight:bold">
                  <?php echo $cate['DESCRIPTION']; ?>
                </span>

              <?php
              }
              ?>
              <br>
              <br>
              <h5 class="mt-0" style="color: white">Titulo: <?php echo $row['TITLE']; ?>.</h5>
              <br>
              <small style="color: white">Fecha de noticia: </small>
              <small style="color: white"><?php echo $row['DATE_OF_NEWS']; ?></small>
              <br>
              <p style="color: white">Resumen: <?php echo $row['DESCRIPTION']; ?></p>
              <a href="noticia.php?id=<?php echo $row['NEWS_ID'] ?>" class="stretched-link">Ir a noticia</a>
            </div>
          </div>

        <?php
        }
        
        $i = NULL;
        $a = NULL;
        $row = NULL;
        $row3 = NULL;
        $idNoticia = 0;
        $idNoticia1 = 0;
        $idNoticia2 = 0;
        $noticias1 = NULL;
        $claveNew = NULL;
        $resClaveN = NULL;
        $resNews1 = NULL;
        $resCateN = NULL;

        ?>
      </div>
    </div>

  </div>

</div>

<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Principal.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>