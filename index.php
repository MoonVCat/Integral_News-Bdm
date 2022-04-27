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

    <div class="row g-0 bg-light position-relative">
      <div class="col-md-6 mb-md-0 p-md-4">
        <img src="http://www.periodicojudicial.gov.ar/wp-content/uploads/2017/12/NOTICIAS-800x502.jpg" class="w-100" alt="...">
      </div>
      <div class="col-md-6 p-4 ps-md-0">
        <h5 class="mt-0">Lorem ipsum dolor sit amet.</h5>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi quibusdam doloremque totam. Deleniti quos, reiciendis impedit vero deserunt repellat, quasi neque dolorum inventore voluptatem repudiandae eaque. Impedit, quo commodi? Id!</p>
        <a href="noticia.php" class="stretched-link">Go somewhere</a>
      </div>
    </div>


    <div class="row g-0 bg-light position-relative">
      <div class="col-md-6 mb-md-0 p-md-4">
        <img src="https://www.parqueempresarial.es/wp-content/uploads/2020/09/BITCOIN-3.jpg" class="w-100" alt="...">
      </div>
      <div class="col-md-6 p-4 ps-md-0">
        <h5 class="mt-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores?</h5>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti alias pariatur ab maiores iure quia beatae quis a atque illum dolores, adipisci earum reprehenderit quas exercitationem cum, voluptates ipsum porro?</p>
        <a href="noticia.php" class="stretched-link">Go somewhere</a>
      </div>
    </div>


    <div class="row g-0 bg-light position-relative">
      <div class="col-md-6 mb-md-0 p-md-4">
        <img src="http://antenasanluis.mx/wp-content/uploads/2020/06/15929145909729.jpg" class="w-100" alt="...">
      </div>
      <div class="col-md-6 p-4 ps-md-0">
        <h5 class="mt-0">Lorem, ipsum dolor.</h5>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi quibusdam doloremque totam. Deleniti quos, reiciendis impedit vero deserunt repellat, quasi neque dolorum inventore voluptatem repudiandae eaque. Impedit, quo commodi? Id!</p>
        <a href="noticia.php" class="stretched-link">Go somewhere</a>
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