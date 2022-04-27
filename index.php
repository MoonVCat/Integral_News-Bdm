<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$new = "SELECT COLOR_ID, COLOR FROM COLORS ORDER BY COLOR ASC";
$resultado = $mysqli->query($new);

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
    <div class="card-group">
      <div class="card">
        <img src="https://image.freepik.com/vector-gratis/diseno-fondo-noticias-falsas_23-2148504681.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <a href="noticia.php" class="stretched-link">Go somewhere</a>
        </div>
      </div>
      <div class="card">
        <img src="https://image.freepik.com/vector-gratis/diseno-fondo-noticias-falsas_23-2148504681.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <a href="noticia.php" class="stretched-link">Go somewhere</a>
        </div>
      </div>
      <div class="card">
        <img src="https://image.freepik.com/vector-gratis/diseno-fondo-noticias-falsas_23-2148504681.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <a href="noticia.php" class="stretched-link">Go somewhere</a>
        </div>
      </div>
      <div class="card">
        <img src="https://image.freepik.com/vector-gratis/diseno-fondo-noticias-falsas_23-2148504681.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <a href="noticia.php" class="stretched-link">Go somewhere</a>
        </div>
      </div>
      <div class="card">
        <img src="https://image.freepik.com/vector-gratis/diseno-fondo-noticias-falsas_23-2148504681.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <a href="noticia.php" class="stretched-link">Go somewhere</a>
        </div>
      </div>


    </div>

    <ol></ol>

    <figure class="text-center">
      <h1>Noticias más recientes</h1>
    </figure>

    <?php

    $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, DATE_OF_NEWS, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS ORDER BY CREATION_DATE DESC";
    $news = $mysqli->query($new);

    while ($row = mysqli_fetch_assoc($news)) {
      $idNew = $row['NEWS_ID'];

      $categ = "SELECT DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE $idNew = `NEWS_ID`";
      $category = $mysqli->query($categ);
      $i = mysqli_fetch_array($category);
      $color = $i['COLOR'];

      $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE $idNew = `NEWS_ID`";
      $imagen = $mysqli->query($img);
      $a = mysqli_fetch_array($imagen);
      if (strcmp($row['NEW_STATUS'], "Publicada") == 0) {
    ?>
        <div style="background-color:<?php echo $color ?>" class="row g-0 bg-light position-relative">

          <div style="background-color:<?php echo $color ?>" class="col-md-6 mb-md-0 p-md-4">
            <img src="<?php echo $a['NEWS_TITLE']; ?>" class="w-40" alt="...">
          </div>
          <div style="background-color:<?php echo $color ?>" class="col-md-6 p-4 ps-md-0">
            <h5 class="mt-0" style="color: black">Titulo: <?php echo $row['TITLE']; ?>.</h5>
            <br>
            <small ><?php echo $row['DATE_OF_NEWS']; ?></small>
            <br>
            <p style="color: black">Resumen: <?php echo $row['DESCRIPTION']; ?></p>
            <a href="noticia.php?id=<?php echo $row['NEWS_ID'] ?>" class="stretched-link">Go somewhere</a>
          </div>
        </div>

    <?php
      }
    }
    ?>
  </div>

</div>



<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Principal.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>