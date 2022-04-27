<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerNew.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$idRepo = $_SESSION["USER_ID"];
$new = "SELECT COLOR_ID, COLOR FROM COLORS ORDER BY COLOR ASC";
$resultado = $mysqli->query($new);

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $image = $_SESSION["image"];
    $nomCom = $_SESSION["nombreCom"];

    $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, TEXT_NEWS, CITY, SUBURB, COUNTRY, DATE_OF_NEWS, HOUR_OF_NEWS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS WHERE NEWS_ID = $id";
    $resultado = $mysqli->query($new);

    $newImage = "SELECT N_IMAGE_ID, NEWS_ID, NEWS_TITLE, NEWS_IMAGE, NEWS_TYPE FROM NEWS_IMAGE WHERE NEWS_ID = $id";
    $resImage = $mysqli->query($newImage);

    $newClave = "SELECT N_CLAVE_ID, NEWS_ID, NEWS_CLAVE FROM NEWS_CLAVE WHERE NEWS_ID = $id";
    $resClave = $mysqli->query($newClave);

    $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = $id";
    $resCate = $mysqli->query($newCate);
}

?>

<div class="content">
    <div class="preguntas">

        <div class="container text-center">

            <?php

            while ($row = mysqli_fetch_assoc($resultado)) {
                $idNew = $row['NEWS_ID'];
            ?>
                <b style="color: white">Categorias</b>
                <hr style="height:6px;">

                <?php
                while ($cate = $resCate->fetch_assoc()) {
                ?>
                    <h3 style="color: <?php echo $cate['COLOR']; ?>;align-content: space-around"><?php echo $cate['DESCRIPTION']; ?></h3>

                <?php
                }
                ?>
                <div class="titulo text-center">
                    <div class="card-title  text-center">
                        <br>
                        <hr style="height:6px;">
                        <img src="<?php echo $image; ?>" class="img text-center" width="80" height="80" alt="...">
                        <br>
                        <br>
                        <small style="color: white"> Nombre del Reportero/a </small>
                        <h3 class="card-title text-center "><?php echo $nomCom; ?></h3>
                        <br>
                        <small style="color: white"> Firma </small>
                        <h6 class="card-title text-center "><?php echo $row['SIGN']; ?></h6>
                        <br>
                        <hr style="height:6px;">
                    </div>

                    <p class="card-text  text-center"><small class="text-muted"><?php echo $row['DATE_OF_NEWS']; ?></small>

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2" fill="currentColor" xmlns="http://www.w3.org/200ssssss0/svg">
                            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                        </svg>
                    </p>
                    <p class="card-text  text-center"><small class="text-muted"><?php echo $row['COUNTRY']; ?> , <?php echo $row['CITY']; ?> , <?php echo $row['SUBURB']; ?></small>
                    <p class="card-text  text-center"><small class="text-muted"><?php echo $row['HOUR_OF_NEWS']; ?></small>
                        <hr style="height:6px;">
                        <br>
                        <br>
                        <b style="color: white">Titulo</b>
                        <hr style="height:6px;">
                    </p>
                    <h1><?php echo $row['TITLE']; ?></h1>
                    <hr style="height:6px;">
                </div>
                <hr>

                <div class="contenido-notica text-center">

                    <div class=" corto">
                        <br>
                        <b style="color: white">Resumen de noticia</b>
                        <hr style="height:6px;">
                        <h4>
                            <?php echo $row['DESCRIPTION']; ?>
                        </h4>
                        <hr style="height:6px;">
                    </div>

                    <div style="text-align: center;" class="form-group">
                        <?php
                        $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE $idNew = `NEWS_ID`";
                        $imagen = $mysqli->query($img);
                        $a = mysqli_fetch_array($imagen);
                        ?>
                        <img src="<?php echo $a['NEWS_TITLE']; ?>" id="imgTitulo" name="imgTitulo" width="120" height="120" class="card-img" alt="...">

                    </div>

                    <div class=" descrip">
                        <b style="color: white">Info de noticia</b>
                        <hr style="height:6px;">
                        <p>

                        <h5>
                            <?php echo $row['TEXT_NEWS']; ?>
                        </h5>
                        </b>
                        <hr style="height:6px;">
                    </div>

                    <div style="text-align: center;" class="form-group">
                        <br>
                        <b style="color: white" for="exampleFormControlFile1">Imagenes de la noticia</b>
                        <br>
                        <br>
                        <section aria-label="Newest Photos">
                            <div class="carousel" data-carousel style="text-align: center;">
                                <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
                                <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
                                <ul data-slides>
                                    <?php
                                    $i = mysqli_fetch_array($resImage);
                                    $color = $i['NEWS_TITLE'];
                                    ?>

                                    <li class="slide" data-active>
                                        <img style="margin:auto;" src="<?php echo $color ?>" alt="Nature Image #1">
                                    </li>
                                    <?php
                                    while ($row2 = mysqli_fetch_assoc($resImage)) {

                                        if (strcmp($row2['NEWS_TYPE'], "mp4") !== 0) {
                                    ?>
                                            <li class="slide">
                                                <img style="margin:auto;" src="<?php echo $row2['NEWS_IMAGE'] ?>" alt="">
                                            </li>
                                        <?php
                                        } else {
                                        ?><li class="slide">
                                                <video style="margin:auto;" controls>
                                                    <source src="<?php echo $row2['NEWS_IMAGE'] ?>" type="video/mp4">
                                                </video>
                                            </li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </section>
                    </div>

                    <div class="contenido-notica text-center">
                        <br>
                        <br>
                        <b style="color: white">Palabras clave</b>

                        <hr style="height:6px;">

                        <?php
                        while ($clave = $resClave->fetch_assoc()) {
                        ?>
                            <h5 style="color: white;align-content: space-around"><?php echo $clave['NEWS_CLAVE']; ?></h5>

                        <?php
                        }
                        ?>
                        <hr style="height:6px;">
                        <br>
                        <small><?php echo $row['CREATION_DATE'] ?></small>
                    </div>

                </div>

            <?php
            }
            ?>

        </div>

    </div>

</div>


<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>


</html>