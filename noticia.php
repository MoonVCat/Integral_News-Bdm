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

    $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, TEXT_NEWS, CITY, SUBURB, COUNTRY, DATE_OF_NEWS, HOUR_OF_NEWS, CREATION_DATE, CREATED_BY, COMMENTS_EDITOR, `LIKES`, USER_DELETED FROM NEWS WHERE NEWS_ID = $id";
    $resNew = $mysqli->query($new);
    $new = NULL;

    $newImage = "SELECT N_IMAGE_ID, NEWS_ID, NEWS_TITLE, NEWS_IMAGE, NEWS_TYPE FROM NEWS_IMAGE WHERE NEWS_ID = $id";
    $resImage = $mysqli->query($newImage);
    $newImage = NULL;

    $newClave = "SELECT N_CLAVE_ID, NEWS_ID, NEWS_CLAVE FROM NEWS_CLAVE WHERE NEWS_ID = $id";
    $resClave = $mysqli->query($newClave);
    $newClave = NULL;

    $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = $id";
    $resCate = $mysqli->query($newCate);
    $newCate = NULL;
}

?>

<div class="content">
    <div class="preguntas">

        <div class="container text-center">

            <?php
            while ($row = mysqli_fetch_assoc($resNew)) {
                $idUser = $row['CREATED_BY'];

            ?>
                <b>Categorias</b>
                <hr style="height:6px;">

                <?php
                while ($cate = $resCate->fetch_assoc()) {
                ?>
                    <span style="background-color:<?php echo $cate['COLOR'] ?>;align-content: space-around; font-size: 200%;font-weight:bold">
                        <?php echo $cate['DESCRIPTION']; ?>
                    </span>

                <?php
                }
                ?>
                <div class="titulo text-center">
                    <div class="card-title  text-center">
                        <br>
                        <hr style="height:6px;">
                        <?php
                        if ($row['USER_DELETED'] == 0) {

                            $repo = "SELECT USER_ID, FULL_NAME, PROFILE_PIC FROM USERS WHERE USER_ID = $idUser";
                            $resRepo = $mysqli->query($repo);
                            $aRepo = mysqli_fetch_array($resRepo);
                            $repo = NULL;
                        ?>
                            <a href="perfilAjeno.php?idAjeno=<?php echo $aRepo['USER_ID'] ?>">
                                <img src="<?php echo $aRepo['PROFILE_PIC']; ?>" class="img text-center" width="80" height="80" alt="...">
                            </a>
                            <br>
                            <br>
                            <small> Nombre del Reportero/a </small>
                            <h3 class="card-title text-center "><?php echo $aRepo['FULL_NAME']; ?></h3>
                            <br>
                        <?php
                        } else if ($row['USER_DELETED'] == 1) {
                        ?>
                            <img src="usuariodefault.png" class="img text-center" width="80" height="80" alt="...">
                            <h3 class="card-title text-center ">//Reportero Eliminado//</h3>
                        <?php
                        }
                        ?>
                        <small> Firma </small>
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
                        <p>
                        <h4><?php echo $row['DESCRIPTION']; ?></h4>
                        </p>
                        <hr style="height:6px;">
                    </div>

                    <div style="text-align: center;" class="form-group">
                        <?php
                        $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE $id = `NEWS_ID`";
                        $imagen = $mysqli->query($img);
                        $a = mysqli_fetch_array($imagen);
                        $img = NULL;
                        ?>
                        <img src="<?php echo $a['NEWS_TITLE']; ?>" id="imgTitulo" name="imgTitulo" width="120" height="120" class="card-img" alt="...">

                    </div>

                    <div class=" descrip">

                        <b>Info de noticia</b>
                        <hr style="height:6px;">
                        <p>

                        <p>
                        <h5> <?php echo $row['TEXT_NEWS']; ?></h5>
                        </p>

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

                    <form class="form" action="./includes/likes_inc.php" method="post" enctype="multipart/form-data">
                        <b>-Likes-</b>
                        <br>
                        <br>
                        <?php
                        if (isset($_SESSION['USER_ID'])) {
                        ?>
                            <?php
                            $likes =  "SELECT NEWS_FK, `LIKE`, USER_FK from NEWS_LIKES where NEWS_FK= $id AND USER_FK= $idRepo";
                            $resLikes = $mysqli->query($likes);
                            $likes = NULL;

                            if ($row3 = mysqli_fetch_assoc($resLikes)) {

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
                        <br>
                        <br>

                        <a 
                            href="https://twitter.com/share?ref_src=twsrc%5Etfw" 
                            class="twitter-share-button" 
                            data-size="large" 
                            data-text="Compartir Noticia 

Titulo: <?php echo $row['TITLE'] ?>

Link:
" 
                            data-hashtags="IntegralNews" 
                            data-show-count="false">
                            Tweet
                        </a>
                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                    <?php
                }

                    ?>
                    </form>
                </div>
                <!-- Contenedor Principal -->
                <br>
                <br>
                <br>
                <h1>Comentarios</h1>

                <?php

                $vacio = '';
                $comment =  "SELECT * FROM COMMENT WHERE FK_NEWS = $id AND FK_COMMENT = 0";
                $resComment = $mysqli->query($comment);
                if (isset($_SESSION["USER_ID"])) {
                    $userIdSession = $_SESSION["USER_ID"];
                }

                if ($resComment) {
                    while ($row4 = mysqli_fetch_assoc($resComment)) {

                        $user = $row4['FK_USER'];
                        $commentDatos =  "SELECT * FROM USERS WHERE USER_ID = $user";
                        $resCommentDatos = $mysqli->query($commentDatos);
                        $row5 = mysqli_fetch_assoc($resCommentDatos);
                ?>
                        <section class="Comentarios">
                            <div class="comments-container">
                                <ul id="comments-list" class="comments-list">
                                    <div class="comment-main-level">
                                        <div class="comment-box">
                                            <!-- Avatar -->
                                            <?php
                                            if ($row4['USER_DELETED'] == 0) {
                                            ?>
                                                <div class="comment-avatar">
                                                    <img src="<?php echo $row5['PROFILE_PIC'] ?>" width="40" height="40" alt="">
                                                </div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-head">
                                                    <?php
                                                    if (strcmp($row5['USER_ID'], $idUser) == 0) {
                                                    ?>
                                                        <h6 class="comment-name by-author"><a href="perfilAjeno.php?idAjeno=<?php echo $row5['USER_ID'] ?>"><?php echo $row5['USERNAME'] ?></a></h6>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <h6 class="comment-name by-user"><a href="perfilAjeno.php?idAjeno=<?php echo $row5['USER_ID'] ?>"><?php echo $row5['USERNAME'] ?></a></h6>
                                                    <?php
                                                    }
                                                    ?>
                                                    <span><a style="font-weight:900">Fecha </a><a><?php echo $row4['DATE_CREATION'] ?></a><br></span>
                                                    <div class="boton-corazon text-right">
                                                        <?php

                                                        $userIdComents = $row4['FK_USER'];

                                                        if (isset($_SESSION['USER_ID'])) {

                                                            if ($userIdComents == $userIdSession) {
                                                        ?>
                                                                <a onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/eliminar_inc.php?idComentario=<?php echo $row4['ID_COMMENT']; ?>&idNoticia=<?php echo  $_GET["id"]; ?>">
                                                                    <i class='far fa-trash-alt' style='font-size:24px'></i>
                                                                </a>

                                                                <a id="BtnEdicion" onClick="
                                                            if(contador==0){
                                                            document.getElementById('<?php echo $row4['ID_COMMENT']; ?>').style.display = 'inline';
                                                            document.getElementById('<?php echo $row4['ID_COMMENT']; ?>content').style.display = 'none'
                                                            document.getElementById('<?php echo $row4['ID_COMMENT']; ?>ButEditar').style.display = 'inline'
                                                            contador=1;
                                                            }
                                                            else{
                                                            document.getElementById('<?php echo $row4['ID_COMMENT']; ?>').style.display = 'none';
                                                            document.getElementById('<?php echo $row4['ID_COMMENT']; ?>content').style.display = 'inline'
                                                            document.getElementById('<?php echo $row4['ID_COMMENT']; ?>ButEditar').style.display = 'none'
                                                            contador=0;
                                                            }">
                                                                    <i class='far fa-edit' style='font-size:24px'></i>
                                                                </a>
                                                            <?php
                                                            } else if ($idUser == $userIdSession) {
                                                            ?>
                                                                <a onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/eliminar_inc.php?idComentario=<?php echo $row4['ID_COMMENT']; ?>&idNoticia=<?php echo  $_GET["id"]; ?>">
                                                                    <i class='far fa-trash-alt' style='font-size:24px'></i>
                                                                </a>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                        <form class="form" action="./includes/comentarioUpdate_inc.php" method="post" enctype="multipart/form-data">


                                                            <input name="EdicionNuevo" style="display:none;" size="8" id='<?php echo $row4['ID_COMMENT']; ?>' size="8" class="form-control" type="text" name="Comentario" id="Comentario" value="<?php echo $row4['CONTENT'] ?>" placeholder="Editar Comentario">
                                                            <input value="<?php echo $id ?>" name="idNews" id="idNews" hidden />
                                                            <input value="<?php echo $row4['ID_COMMENT']; ?>Id" name="idComen" id="idComen" hidden />

                                                            <button id='<?php echo $row4['ID_COMMENT']; ?>ButEditar' type="submit" name="submit" style="display:none">
                                                                <a class="far fa-paper-plane"></a>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="comment-avatar">
                                                    <img src="usuariodefault.png" width="40" height="40" alt="">
                                                </div>
                                                <div class="comment-head">
                                                    <h6 align="left">///Usuario Eliminado///</h6>
                                                    <span><a style="font-weight:900">Fecha </a><a><?php echo $row4['DATE_CREATION'] ?></a><br></span>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="comment-content" align="left">
                                                <p id='<?php echo $row4['ID_COMMENT']; ?>content'><?php echo $row4['CONTENT'] ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </ul>

                            </div>

                        </section>

                        <?php
                        $comId =  $row4['ID_COMMENT'];
                        $answer =  "SELECT * FROM COMMENT WHERE FK_COMMENT = $comId";
                        $resAnswer = $mysqli->query($answer);

                        while ($row6 = mysqli_fetch_assoc($resAnswer)) {
                            $idNoticia2 = $id;
                            $user2 = $row6['FK_USER'];
                            $NewsCommentDatos2 =  "SELECT * FROM USERS WHERE USER_ID = $user2";
                            $NewsCommentDatosSql2 = $mysqli->query($NewsCommentDatos2);
                            $row7 = mysqli_fetch_assoc($NewsCommentDatosSql2);

                        ?>
                            <br>
                            <section class="Comentarios2">
                                <div class="comments-container" align="left" style="position:relative; left:200px;">
                                    <ul id="comments-list" class="comments-list">
                                        <div class="comment-main-level">
                                            <div class="comment-box">
                                                <?php
                                                if ($row6['USER_DELETED'] == 0) {
                                                ?>
                                                    <!-- Avatar -->
                                                    <div class="comment-avatar">
                                                        <img src="<?php echo $row7['PROFILE_PIC'] ?>" width="40" height="40" alt="">
                                                    </div>
                                                    <div class="comment-head">
                                                        <?php
                                                        if (strcmp($row7['USER_ID'], $idUser) == 0) {
                                                        ?>
                                                            <h6 class="comment-name by-author"><a href="perfilAjeno.php?idAjeno=<?php echo $row7['USER_ID'] ?>"><?php echo $row7['USERNAME'] ?></a></h6>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <h6 class="comment-name by-user"><a href="perfilAjeno.php?idAjeno=<?php echo $row7['USER_ID'] ?>"><?php echo $row7['USERNAME'] ?></a></h6>
                                                        <?php
                                                        }
                                                        ?>
                                                        <span><a style="font-weight:900">Fecha </a><a><?php echo $row6['DATE_CREATION'] ?></a><br></span>
                                                        <div class="boton-corazon text-right">
                                                            <?php
                                                            if (isset($_SESSION["USER_ID"])) {
                                                                $userIdAnswers = $row6['FK_USER'];

                                                                if ($userIdAnswers == $userIdSession) {
                                                            ?>
                                                                    <a onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/eliminar_inc.php?idComentario=<?php echo $row6['ID_COMMENT']; ?>&idNoticia=<?php echo  $_GET["id"]; ?>">
                                                                        <i class='far fa-trash-alt' style='font-size:24px'></i>
                                                                    </a>
                                                                    <a id="BtnEdicion" onClick="
                                                                    if(contadorRespuesta==0){
                                                                    document.getElementById('<?php echo $row6['ID_COMMENT']; ?>').style.display = 'inline';
                                                                    document.getElementById('<?php echo $row6['ID_COMMENT']; ?>content').style.display = 'none'
                                                                    document.getElementById('<?php echo $row6['ID_COMMENT']; ?>ButEditar').style.display = 'inline'
                                                                    contadorRespuesta=1;
                                                                    }
                                                                    else{
                                                                    document.getElementById('<?php echo $row6['ID_COMMENT']; ?>').style.display = 'none';
                                                                    document.getElementById('<?php echo $row6['ID_COMMENT']; ?>content').style.display = 'inline'
                                                                    document.getElementById('<?php echo $row6['ID_COMMENT']; ?>ButEditar').style.display = 'none'
                                                                    contadorRespuesta=0;
                                                                    } " class='bx bxs-edit-alt bx-md bx-tada-hover'>
                                                                        <i class='far fa-edit' style='font-size:24px'></i>
                                                                    </a>
                                                                <?php
                                                                } else if ($idUser == $userIdSession) {
                                                                ?>
                                                                    <a onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/eliminar_inc.php?idComentario=<?php echo $row6['ID_COMMENT']; ?>&idNoticia=<?php echo  $_GET["id"]; ?>">
                                                                        <i class='far fa-trash-alt' style='font-size:24px'></i>
                                                                    </a>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                            <form class="form" action="./includes/comentarioUpdate_inc.php" method="post" enctype="multipart/form-data">

                                                                <input name="EdicionNuevo" style="display:none;" size="8" id='<?php echo $row6['ID_COMMENT']; ?>' size="8" class="form-control" type="text" name="Comentario" id="Comentario" value="<?php echo $row6['CONTENT'] ?>" placeholder="Editar Comentario">
                                                                <input value="<?php echo $id ?>" name="idNews" id="idNews" hidden />
                                                                <input value="<?php echo $row6['ID_COMMENT']; ?>Id" name="idComen" id="idComen" hidden />


                                                                <button id='<?php echo $row6['ID_COMMENT']; ?>ButEditar' type="submit" name="submit" style="display:none">

                                                                    <a class="far fa-paper-plane"></a>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="comment-avatar">
                                                        <img src="usuariodefault.png" width="40" height="40" alt="">
                                                    </div>
                                                    <div class="comment-head">
                                                        <h6>///Usuario Eliminado///</h6>
                                                        <span><a style="font-weight:900">Fecha </a><a><?php echo $row6['DATE_CREATION'] ?></a><br></span>
                                                    </div>

                                                <?php
                                                }
                                                ?>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-content">
                                                    <p id='<?php echo $row6['ID_COMMENT']; ?>content'><?php echo $row6['CONTENT'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>

                                </div>

                            </section>
                            <br>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION["USER_ID"])) {
                        ?>
                            <form class="form" action="./includes/respuesta_inc.php" method="post" enctype="multipart/form-data">
                                <div>

                                    <input value="<?php echo $id ?>" name="idNews" id="idNews" hidden />
                                    <input value="<?php echo $row4['ID_COMMENT'] ?>" name="idCom" id="idCom" hidden />
                                    <div id="Respuesta">
                                        <h5 style=" margin-left: 200px;">Responder</h5>

                                        <div class="Escribir" align="right">
                                            <textarea class="form-control" align="right" size="4" type="text" name="Comentario" id="Comentario" placeholder="Responder el comentario" rows="4" cols="50" maxlength="500" required></textarea>
                                            <button type="submit" name="submit" id="submit">
                                                <i class='fas fa-angle-right' style='font-size:24px'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </form>
                        <?php
                        } else {
                        ?>
                            <a href="registro.php">
                                <b class="cuentaReg">No puedes responder sin una cuenta, hazte una cuenta ya, ya te dije</b>
                            </a>
                <?php
                        }
                    }
                }
                ?>

                <?php if (isset($_SESSION["USER_ID"])) {
                ?>
                    <form class="form" action="./includes/comentario_inc.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="comentario" id="comentario" placeholder="Escribe un comentario" class="form-control" maxlength="500" style="height: 100px;" required></textarea>
                            <input name=idNews id=idNews style="display:none;" value="<?php echo $id ?>" hidden />
                            <ol>
                                <br>
                                <div class="botonBonito">
                                    <button type="submit" name="submit" value="Agregar comentarios" class="btn btn-info">Subir Comentario</button>
                                </div>
                            </ol>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <a href="registro.php">
                        <br>
                        <br>
                        <br>
                        <br>
                        <h5 style="align-content: space-around">¿Quieres dar tu opinion equivocada? Crea una cuenta!</h5>
                    </a>
                <?php
                }
                $resNew = NULL;
                $resImage = NULL;
                $resClave = NULL;
                $resCate = NULL;
                $resRepo = NULL;
                $imagen = NULL;
                ?>
        </div>
        <br>
    </div>
</div>

<script>
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
</script>

<script>
    var contador = 0;
    var contadorRespuesta = 0;

    function changeStyle() {
        document.getElementById("Respuesta").style.display = "inline";
    }
</script>

<script src="jquery.min.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>


</html>