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

$texto = $_GET["texto"];
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

        $tempClave = "";

        $claveNew = "SELECT * FROM NEWS_CLAVE WHERE NEWS_CLAVE LIKE '$clave1' OR NEWS_CLAVE LIKE '$clave2' OR NEWS_CLAVE LIKE '$clave3'";
        $resClaveN = $mysqli->query($claveNew);

        while ($row2 = mysqli_fetch_assoc($resClaveN)) {

          $idNoticia = $row2['NEWS_ID'];

          if ($texto == "") {

            $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' AND NEW_STATUS = 'Publicada' AND NEWS_ID = '$idNoticia'";
            $resNews1 = $mysqli->query($noticias1);
          } else {

            $noticias1 = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND URGENTES = '$urgente' AND NEW_STATUS = 'Publicada' AND TITLE LIKE '%$texto%' OR DESCRIPTION LIKE '%$texto%' AND NEWS_ID = '$idNoticia'";
            $resNews1 = $mysqli->query($noticias1);
          }


          while ($row = mysqli_fetch_assoc($resNews1)) {

            if ($idNoticia != $tempClave) {

              if (strcmp($row['NEW_STATUS'], 'Publicada') == 0) {
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
                    if($row['URGENTES'] == 1){
                      ?>
                      <h5 class="mt-0" style="color: red">URGENTE</h5>
                      <?php
                    }
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
            }
            $tempClave = $idNoticia;
          }
        }

        $i = NULL;
        $a = NULL;
        $row = NULL;
        $row2 = NULL;
        $noticias1 = NULL;
        $claveNew = NULL;
        $resClaveN = NULL;
        $resNews1 = NULL;

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