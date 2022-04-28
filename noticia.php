<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerNew.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

if (isset($_SESSION['USER_ID'])) {
    $idRepo = $_SESSION["USER_ID"];
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, TEXT_NEWS, CITY, SUBURB, COUNTRY, DATE_OF_NEWS, HOUR_OF_NEWS, CREATION_DATE, CREATED_BY, COMMENTS_EDITOR, `LIKES` FROM NEWS WHERE NEWS_ID = $id";
    $resNew = $mysqli->query($new);

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
            <form class="form" action="./includes/likes_inc.php" method="post" enctype="multipart/form-data">

                <?php
                while ($row = mysqli_fetch_assoc($resNew)) {
                    $idUser = $row['CREATED_BY'];

                    $repo = "SELECT USER_ID, FULL_NAME, PROFILE_PIC FROM USERS WHERE USER_ID = $idUser";
                    $resRepo = $mysqli->query($repo);
                    $aRepo = mysqli_fetch_array($resRepo);
                ?>
                    <b>Categorias</b>
                    <hr style="height:6px;">

                    <?php
                    while ($cate = $resCate->fetch_assoc()) {
                    ?>
                    <span style="background-color:<?php echo $cate['COLOR']?>;align-content: space-around; font-size: 200%;font-weight:bold">
                    <?php echo $cate['DESCRIPTION']; ?>
                    </span>
                        
                    <?php
                    }
                    ?>
                    <div class="titulo text-center">
                        <div class="card-title  text-center">
                            <br>
                            <hr style="height:6px;">
                            <a href="perfilAjeno.php?idAjeno=<?php echo $aRepo['USER_ID'] ?>">
                                <img src="<?php echo $aRepo['PROFILE_PIC']; ?>" class="img text-center" width="80" height="80" alt="...">
                            </a>
                            <br>
                            <br>
                            <small > Nombre del Reportero/a </small>
                            <h3 class="card-title text-center "><?php echo $aRepo['FULL_NAME']; ?></h3>
                            <br>
                            <small > Firma </small>
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
                            <b>Titulo</b>
                            <hr style="height:6px;">
                        </p>
                        <h1><?php echo $row['TITLE']; ?></h1>
                        <hr style="height:6px;">
                    </div>
                    <hr>

                    <div class="contenido-notica text-center">

                        <div class=" corto">
                            <br>
                            <b>Resumen de noticia</b>
                            <hr style="height:6px;">
                            <h4>
                                <?php echo $row['DESCRIPTION']; ?>
                            </h4>
                            <hr style="height:6px;">
                        </div>

                        <div style="text-align: center;" class="form-group">
                            <?php
                            $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE $id = `NEWS_ID`";
                            $imagen = $mysqli->query($img);
                            $a = mysqli_fetch_array($imagen);
                            ?>
                            <img src="<?php echo $a['NEWS_TITLE']; ?>" id="imgTitulo" name="imgTitulo" width="120" height="120" class="card-img" alt="...">

                        </div>

                        <div class=" descrip">
                        
                            <b >Info de noticia</b>
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
                            <b for="exampleFormControlFile1">Imagenes de la noticia</b>
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
                            <b>Palabras clave</b>

                            <hr style="height:6px;">

                            <?php
                            while ($clave = $resClave->fetch_assoc()) {
                            ?>
                                <h5 style="align-content: space-around"><?php echo $clave['NEWS_CLAVE']; ?></h5>

                            <?php
                            }
                            ?>
                            <hr style="height:6px;">
                            <br>
                            <small><?php echo $row['CREATION_DATE'] ?></small>
                            <br>
                            <br>
                        </div>

                        <b>-Likes-</b>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['USER_ID'])) {
                        ?>
                            <?php
                            $likes =  "SELECT NEWS_FK, `LIKE`, USER_FK from NEWS_LIKES where NEWS_FK= $id AND USER_FK= $idRepo";
                            $resLikes = $mysqli->query($likes);

                            if ($row6 = mysqli_fetch_assoc($resLikes)) {

                            ?>
                                <button type="like" name="like" id="like" class='fas fa-heart' style='font-size:24px'> </button>
                                <input value="<?php echo $id ?>" name="likeNew" id="likeNew" hidden />
                                <p id="textLikes" name="textLikes"><?php echo $row['LIKES'] ?></p>
                            <?php
                            } else {
                            ?>
                                <button type="like" name="like" id="like" class='far fa-heart' style='font-size:24px'></button>
                                <input value="<?php echo $id ?>" name="likeNew" id="likeNew" hidden />
                                <p id="textLikes" name="textLikes"><?php echo $row['LIKES'] ?></p>
                            <?php
                            } ?>

                        <?php
                        } else {
                        ?>
                            <a href="registro.php">
                                <h5 style="align-content: space-around">¿Quieres reaccionar a esta noticia? Crea una cuenta!</h5>
                            </a>
                        <?php
                        }
                        ?>

                    <?php
                }
                $new = NULL;
                $newImage = NULL;
                $newClave = NULL;
                $newCate = NULL;
                $repo = NULL;
                $likes = NULL;
                    ?>

                    </div>
            </form>
            <!-- Contenedor Principal -->
            <div class="comments-container">
                <h1>Comentarios</h1>

                <ul id="comments-list" class="comments-list">
                    <li>
                        <div class="comment-main-level">
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                            <!-- Contenedor del Comentario -->


                            <div class="comment-box">
                                <div class="comment-head">


                                    <h6 class="comment-name by-author"><a href="">Edson Lugo</a></h6>
                                    <span>hace 20 minutos</span>
                                    <div class="boton-corazon text-right">
                                        <a href="#" class="">
                                            <i class='fas fa-heart' style='font-size:24px'></i>
                                        </a>
                                        <a href="#" class="">
                                            <i class='far fa-trash-alt' style='font-size:24px'></i>
                                        </a>

                                    </div>
                                </div>


                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?


                                </div>

                            </div>
                        </div>
                        <!-- Respuestas de los comentarios -->
                        <ul class="comments-list reply-list">
                            <li>
                                <!-- Avatar -->
                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                                <!-- Contenedor del Comentario -->
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name"><a href="">Rubí Alvarado</a></h6>
                                        <span>hace 10 minutos </span>
                                        <div class="boton text-right">
                                            <a href="#" class="">
                                                <i class='fas fa-heart' style='font-size:24px'></i>
                                            </a>


                                        </div>



                                    </div>
                                    <div class="comment-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!-- Avatar -->
                                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                                <!-- Contenedor del Comentario -->
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name by-author"><a href="">Edson Lugo</a></h6>
                                        <span>hace 10 minutos </span>
                                        <div class="boton-corazon text-right">
                                            <a href="#" class="">
                                                <i class='fas fa-heart' style='font-size:24px'></i>
                                            </a>
                                            <a href="#" class="">
                                                <i class='far fa-trash-alt' style='font-size:24px'></i>
                                            </a>
                                        </div>


                                    </div>
                                    <div class="comment-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <div class="comment-main-level">
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="">Rubí Alvarado</a></h6>
                                    <span>hace 10 minutos </span>


                                    <a href="#" class="">
                                        <i class='fas fa-heart' style='font-size:24px'></i>
                                    </a>
                                </div>

                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <br>

            <form>
                <div class="form-group">
                    <input type="text" publi="" pa="" placeholder="Agregar un comentario" class="form-control" style="height: 100px;" required>
                    <ol>
                        <br>
                        <input type="submit" value="Agregar comentarios">
                    </ol>
                </div>
            </form>
        </div>

    </div>


    <script src="jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>

    <?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>


    </html>