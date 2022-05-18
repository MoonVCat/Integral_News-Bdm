<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

?>

<div class="content">
  <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.lavanguardia.com/r/GODO/LV/p7/WebSite/2020/09/14/Recortada/img_asalarich_20200720-110429_imagenes_lv_otras_fuentes_ultimas-noticias-madrid-1-k3ZH-U483481112098B5C-992x558@LaVanguardia-Web.jpg" class="d-block w-100" alt="..." width="620px" height="490px">
      </div>
      <div class="carousel-item">
        <img src="https://www.teleamazonas.com/wp-content/uploads/2021/01/noti-si.jpg" class="d-block w-100" alt="..." width="620px" height="490px">
      </div>
      <div class="carousel-item">
        <img src="http://www.clasesdeperiodismo.com/wp-content/uploads/2012/12/Captura-de-pantalla-2012-12-14-a-las-11.00.28.png" class="d-block w-100" alt="..." width="620px" height="490px">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="preguntas">

    <figure class="text-center">
      <h1>Noticias más populares</h1>
    </figure>

    <div class="card-deck">
    
      <?php
      $dest = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, DATE_OF_NEWS, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR, LIKES FROM NEWS where NEW_STATUS = 'Publicada' ORDER BY LIKES DESC;";
      $destRes = $mysqli->query($dest);

      $contador = 0;

      while ($rowPop = mysqli_fetch_assoc($destRes)) {

        $idNew = $rowPop['NEWS_ID'];

        $categ = "SELECT DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE $idNew = `NEWS_ID`";
        $category = $mysqli->query($categ);
        $i = mysqli_fetch_array($category);
        $color = $i['COLOR'];
        $categ = NULL;

        $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE $idNew = `NEWS_ID`";
        $imagen = $mysqli->query($img);
        $a = mysqli_fetch_array($imagen);
        $img = NULL;

        if ($contador < 5) {

      ?>
          <div style="background-color:<?php echo $color ?>" class="row g-0 bg-light position-relative">
            <div style="background-color:<?php echo $color ?>" class="col-md-6 mb-md-0 p-md-4">
              <img src="<?php echo $a['NEWS_TITLE']; ?>" class="w-40" width="200" height="200" alt="...">
            </div>

            <div style="background-color:<?php echo $color ?>" class="col-md-6 p-4 ps-md-0">
              <?php
              $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = $idNew";
              $resCate = $mysqli->query($newCate);
              while ($cate = $resCate->fetch_assoc()) {
              ?>
                <span style="background-color:<?php echo $cate['COLOR'] ?>;align-content: space-around; font-size: 90%;font-weight:bold">
                  <?php echo $cate['DESCRIPTION']; ?>
                </span>

              <?php
              }
              ?>

              <h5 class="mt-0" style="color: white">Titulo: <?php echo $rowPop['TITLE']; ?>.</h5>
              <br>
              <small style="color: white">Fecha de noticia: </small>
              <small style="color: white"><?php echo $rowPop['DATE_OF_NEWS']; ?></small>
              <br>
              <p style="color: white">Resumen: <?php echo $rowPop['DESCRIPTION']; ?></p>
              <?php
              $likes =  "SELECT NEWS_FK, `LIKE`, USER_FK from NEWS_LIKES where NEWS_FK= $idNew";
              $resLikes = $mysqli->query($likes);
              $likes = NULL;
              ?>
              <p style="color: white">Cantidad de Likes: 
                <?php
                if ($row3 = mysqli_fetch_assoc($resLikes)) {

                  echo $rowPop['LIKES'];
                }
                ?>
              </p>
              <a href="noticia.php?id=<?php echo $rowPop['NEWS_ID'] ?>" class="stretched-link">Ir a noticia</a>

            </div>
          </div>
      <?php
        }
        $contador++;
      }
      ?>
    </div>
    <ol></ol>

    <figure class="text-center">
      <h1>Noticias más recientes</h1>
    </figure>

    <div class="card-deck">
      <?php

      $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, DATE_OF_NEWS, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS where NEW_STATUS = 'Publicada' ORDER BY CREATION_DATE DESC";
      $news = $mysqli->query($new);
      $new = NULL;

      while ($row = mysqli_fetch_assoc($news)) {

        $idNew = $row['NEWS_ID'];

        $categ = "SELECT DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE $idNew = `NEWS_ID`";
        $category = $mysqli->query($categ);
        $i = mysqli_fetch_array($category);
        $color = $i['COLOR'];
        $categ = NULL;

        $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE $idNew = `NEWS_ID`";
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
            $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = $idNew";
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
      $news = NULL;
      $category = NULL;
      $imagen = NULL;

      ?>
    </div>

  </div>

</div>

<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Principal.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>