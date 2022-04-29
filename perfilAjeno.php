<?php
session_start();

include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';
?>

<?php
if (isset($_GET['idAjeno'])) {
    $idUser = $_GET['idAjeno'];
    $ajeno = "SELECT USER_ID, EMAIL, FULL_NAME, PROFILE_PIC, USER_TYPE_ID, PHONE, USERNAME, USER_INFO FROM USERS WHERE USER_ID = $idUser";
    $resAjeno = $mysqli->query($ajeno);
    $rowAjeno = mysqli_fetch_array($resAjeno);
    $ajeno = NULL;

    $sign = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, DATE_OF_NEWS, NEW_STATUS, CREATION_DATE FROM NEWS WHERE CREATED_BY = $idUser";
    $resultado = $mysqli->query($sign);
}
?>

<div class="content">
    <!----->
    <div class="d-flex" id="wrapper">
        <div class="info_usuario">
            <div class="container text-center">
                <div class="content-profile-page">
                    <div class="profile-user-page card">

                        <div class="img-user-profile">
                            <img class="profile-bgHome" src="https://www.sbs.com.au/yourlanguage/sites/sbs.com.au.yourlanguage/files/podcast_images/sbs_04.jpg" />
                            <img class="avatar" src='<?php echo $rowAjeno['PROFILE_PIC']; ?>' alt="jofpin" />

                        </div>
                        <div class="user-profile-data">

                            <h1>
                                <?php
                                echo '<a>' . $rowAjeno['USERNAME'] . '</a>';
                                ?>
                            </h1>
                            <br>
                            <?php
                            echo '<h4>' . $rowAjeno['FULL_NAME'] . '</h4>';
                            ?>
                            <br>
                            <h6>-Telefono de contacto-</h6>
                            <p>
                                <?php
                                echo '<a>' . $rowAjeno['PHONE'] . '</a>';
                                ?>
                            </p>
                            <h6>-Correo-</h6>
                            <p>
                                <?php
                                echo '<a>' . $rowAjeno['EMAIL'] . '</a>';
                                ?>
                            </p>

                        </div>
                        <div class="description-profile">
                            <h6>-Acerca de mi-</h6>
                            <?php
                            echo '<a>' . $rowAjeno['USER_INFO'] . '</a>';
                            ?>
                        </div>
                        <br>
                        <div class="description-profile">
                            <h6>-Rol-</h6>
                            <?php
                            if ($rowAjeno['USER_TYPE_ID'] == 1) {
                            ?>
                                <a>Editor</a>
                            <?php
                            } else if ($rowAjeno['USER_TYPE_ID'] == 2) {
                            ?>
                                <a>Reportero</a>
                                <br>
                                <br>
                                <h6>-Firmas-</h6>
                                <p>
                                    <?php
                                    while ($row = $resultado->fetch_assoc()) {

                                        echo '<a>' . $row['SIGN'] . '</a>';
                                    }
                                    ?>
                                </p>
                            <?php
                            }
                            ?>
                        </div>

                        <ul class="data-user">
                            <li class="seccion">
                                <a href="#noticia" class="seccion">Mis noticias</a>
                            </li>
                            <li class="seccion1">
                                <a href="#favoritos" class="seccion1">Mis favoritos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------- mis noticias --------------------------------------------------------->

            <div class="container text-center">
                <?php
                if ($rowAjeno['USER_TYPE_ID'] == 2) {
                ?>
                    <hr>
                    <h4 style="color: white">Mis noticias</h4>
                    </hr>
                    <section id="noticia" class="seccion">

                        <div class="recent-news ">
                            <div class="card mb-3 body-card ">

                                <?php
                                $resNew = $mysqli->query($sign);
                                while ($row = mysqli_fetch_assoc($resNew)) {

                                    if (strcmp($row['NEW_STATUS'], "Publicada") == 0) {

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
                                        <div class="row no-gutters" style="background-color:<?php echo $color ?>">
                                            <div class="col-md-4" style="background-color:<?php echo $color ?>">
                                                <img src="<?php echo $a['NEWS_TITLE']; ?>" class="card-img" width="80" height="250" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body" style="background-color:<?php echo $color ?>">
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

                                                    <p class="card-text"><small style="color: white" class="text-muted">Creado: </small>
                                                        <small style="color: white" class="text-muted"><?php echo $row['CREATION_DATE']; ?></small>
                                                        <i class='far fa-calendar' style='font-size:18px'></i>
                                                    </p>
                                                    <br>
                                                    <a href="noticia.php?id=<?php echo $row['NEWS_ID'] ?>" class="stretched-link">Ir a noticia</a>

                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                $resAjeno = NULL;
                                $resultado = NULL;
                                $category = NULL;
                                $resCate = NULL;
                                $imagen = NULL;
                                ?>

                            </div>
                        </div>

                    </section>
                <?php
                }
                ?>

                <!--------------------------------------------------------- mis favoritos --------------------------------------------------------->
                <hr>
                <h4 style="color: white">Mis favoritos</h4>
                </hr>

                <section id="favoritos" class="seccion1">

                    <div class="recent-news ">
                        <div class="card mb-3 body-card ">
                            <div class="row no-gutters ">

                                <div class="col-md-4">
                                    <img src="http://i.huffpost.com/gen/1385110/images/o-COLBERT-FOX-NEWS-facebook.jpg" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Titulo de la Noticia</h5>
                                        <p class="card-text">Descripcion corta de la noticia Descripcion corta de la noticia
                                            Descripcion corta de la noticia Descripcion corta de la noticia Descripcion corta de la
                                            noticia.</p>

                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>

                                            <i class='far fa-calendar' style='font-size:18px'></i>

                                        </p>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary me-md-2" type="button">Eliminar de favoritos</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </section>
            </div>

        </div>
    </div>

</div>

<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>