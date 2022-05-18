<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';
?>

<?php
$id = $_SESSION['USER_ID'];
$image = $_SESSION['image'];
?>

<!----->
<div class="content">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">

                <a href="crearCate.php" class="list-group-item list-group-item-action">Crear Secciones(Categorias)
                    <i class='far fa-save' style='font-size:18px;color: black'></i>
                </a>
                <a href="editarUser.php" class="list-group-item list-group-item-action">Crear/Eliminar Usuarios
                    <i class='far fa-address-card' style='font-size:18px;color: black'></i>
                </a>
                <a href="aprobarNew.php" class="list-group-item list-group-item-action">Aprobar Noticias
                    <i class='fas fa-pencil-alt' style='font-size:18px;color: black'></i>
                </a>
                <a href="conf.php" class="list-group-item list-group-item-action">Configuración
                    <i class='fas fa-tools' style='font-size:18px;color: black'></i>
                </a>
                <a href="cerrarsesion.php" class="list-group-item list-group-item-action">Cerrar Sesion
                    <i class='far fa-eye' style='font-size:18px;color: black'></i>
                </a>
            </div>
        </div>


        <div class="info_usuario">

            <div class="container text-center">
                <div class="content-profile-page">
                    <div class="profile-user-page card">

                        <div class="img-user-profile">
                            <img class="profile-bgHome" src="https://www.sbs.com.au/yourlanguage/sites/sbs.com.au.yourlanguage/files/podcast_images/sbs_04.jpg" />
                            <img class="avatar" src='<?php echo $image; ?>' alt="jofpin" />

                        </div>
                        <div class="user-profile-data">

                            <h1>
                                <?php echo '<a>' . $_SESSION['username'] . '</a>'; ?>
                            </h1>
                            <br>
                            <?php echo '<h4>' . $_SESSION['nombreCom'] . '</h4>'; ?>

                            <br>

                            <h6>-Telefono de contacto-</h6>

                            <p>
                                <?php echo '<a>' . $_SESSION['phone'] . '</a>'; ?>
                            </p>
                            <h6>-Correo-</h6>
                            <p>
                                <?php echo '<a>' . $_SESSION['user_login'] . '</a>'; ?>
                            </p>

                        </div>
                        <div class="description-profile">
                            <h6>-Acerca de mi-</h6>
                            <?php echo '<a>' . $_SESSION['infoU'] . '</a>'; ?>
                        </div>

                        <ul class="data-user">

                            <li class="seccion1">
                                <a href="#favoritos" class="seccion1">Mis favoritos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------- mis favoritos --------------------------------------------------------->
            <div class="container text-center">

                <hr>
                <h4 style="color: white">Mis favoritos</h4>
                </hr>

                <section id="favoritos" class="seccion1">

                    <?php
                    $likes =  "SELECT NEWS_FK, USER_FK from NEWS_LIKES where USER_FK= $id";
                    $resLikes = $mysqli->query($likes);
                    $likes = NULL;

                    while ($rowLikes = mysqli_fetch_assoc($resLikes)) {

                        $likesNews = $rowLikes['NEWS_FK'];

                        $sign = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, DATE_OF_NEWS, NEW_STATUS, CREATION_DATE FROM NEWS WHERE NEWS_ID = $likesNews AND NEW_STATUS = 'Publicada'";
                        $resultado = $mysqli->query($sign);

                        while ($rowNews = mysqli_fetch_assoc($resultado)) {

                            $idNew = $rowNews['NEWS_ID'];

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

                            <div class="card-deck">
                                <div class="row g-0 bg-light position-relative" style="background-color:<?php echo $color ?>">
                                    <div style="background-color:<?php echo $color ?>" class="col-md-6 mb-md-0 p-md-4">
                                        <img src="<?php echo $a['NEWS_TITLE']; ?>" class="w-40" width="200" height="200" alt="...">
                                    </div>
                                    <div class="col-md-6 p-4 ps-md-0" style="background-color:<?php echo $color ?>">
                                        <?php
                                        $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = $idNew";
                                        $resCate = $mysqli->query($newCate);
                                        $newCate = NULL;
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
                                        <h5 class="mt-0" style="color: white">Titulo: <?php echo $rowNews['TITLE']; ?>.</h5>
                                        <br>
                                        <small style="color: white">Fecha de noticia: </small>
                                        <small style="color: white"><?php echo $rowNews['DATE_OF_NEWS']; ?></small>
                                        <br>
                                        <p style="color: white">Resumen: <?php echo $rowNews['DESCRIPTION']; ?></p>

                                        <p class="card-text"><small style="color: white">Creado: </small>
                                            <small style="color: white"><?php echo $rowNews['CREATION_DATE']; ?></small>
                                            <i class='far fa-calendar' style='font-size:18px'></i>
                                        </p>
                                        <br>
                                        <a href="noticia.php?id=<?php echo $rowNews['NEWS_ID'] ?>" class="stretched-link">Ir a noticia</a>
                                    </div>
                                </div>

                            </div>

                    <?php
                        }
                    }
                    ?>

                </section>

            </div>

        </div>
    </div>
</div>


<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>