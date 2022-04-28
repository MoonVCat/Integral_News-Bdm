<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$idRepo = $_SESSION["USER_ID"];
?>

<div class="content">

    <div class="d-flex" id="wrapper">
        <!----->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <!-- Sidebar -->
            <div class="list-group list-group-flush">

                <?php

                if ($_SESSION["user_type"] == 1) {
                ?>
                    <a href="perfilEditor.php" class="list-group-item list-group-item-action">Perfil
                        <i class='fas fa-tools' style='font-size:18px;color: black'></i>
                    </a>
                <?php
                } else if ($_SESSION["user_type"] == 2) {
                ?>
                    <a href="perfilReportero.php" class="list-group-item list-group-item-action">Perfil
                        <i class='fas fa-tools' style='font-size:18px;color: black'></i>
                    </a>
                <?php
                } else if ($_SESSION["user_type"] == 3) {
                ?>
                    <a href="perfilUsuario.php" class="list-group-item list-group-item-action">Perfil
                        <i class='fas fa-tools' style='font-size:18px;color: black'></i>
                    </a>
                <?php
                }
                ?>
                <a href="crearNoticia.php" class="list-group-item list-group-item-action">Crear Noticias
                    <i class='far fa-save' style='font-size:18px;color: black'></i>
                </a>
                <a class="list-group-item list-group-item-action" onClick="javascript: return confirm('Seguro q te quieres ir? :c etto etto');" href="includes/delete_inc.php?deleteid=<?php echo $id; ?>">Eliminar cuenta
                    <i class='far fa-folder-open' style='font-size:18px;color: black'></i>
                </a>
                <a href="cerrarsesion.php" class="list-group-item list-group-item-action">Cerrar Sesion
                    <i class='far fa-eye' style='font-size:18px;color: black'></i>
                </a>
            </div>
        </div>

        <div class="container p-4">
            <div class="row">
                <div class="col-md-15">
                    <h3 style="text-align: center;" for="exampleFormControlFile1">Portal de Noticias</h3>
                    <br>
                    <br>
                    <div class="recent-news ">
                        <div class="card mb-3 body-card ">

                            <div class="row no-gutters ">
                                <h5 style="text-align: left;">Noticias en proceso:</h5>
                                <?php

                                $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS WHERE CREATED_BY = $idRepo ORDER BY CREATION_DATE DESC";
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
                                ?>

                                    <br>
                                    <br>
                                    <?php
                                    if (strcmp($row['NEW_STATUS'], "En redaccion") == 0) {
                                    ?>
                                        <div class="col-md-4" style="background-color:<?php echo $color ?>">
                                            
                                        <a href="prevNew.php?id=<?php echo $row['NEWS_ID'] ?>">
                                        <img src="<?php echo $a['NEWS_TITLE']; ?>"  width="150" height="250" class="card-img" alt="...">
                                        </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="background-color:<?php echo $color ?>">
                                            <a href="prevNew.php?id=<?php echo $row['NEWS_ID'] ?>">
                                                <h4 style="text-align: left;color: white" class="card-title">Titulo: <?php echo $row['TITLE']; ?></h4>
                                            </a>
                                                <p style="text-align: left;color: white" class="card-text">Descripcion corta: <?php echo $row['DESCRIPTION']; ?>.</p>

                                                <p class="card-text" style="text-align: left;">
                                                    <small style="color: white">Status noticia <?php echo $row['NEW_STATUS']; ?> </small>
                                                    <br>

                                                    <small style="color: white">Firma reportero: <?php echo $row['SIGN']; ?></small>
                                                </p>

                                                <p style="text-align: left;" class="card-text">Comentario del editor: " <?php echo $row['COMMENTS_EDITOR']; ?> "</p>

                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <td align="center">

                                                        <a href="editNew.php?id=<?php echo $row['NEWS_ID'] ?>" class="btn btn-secondary">Editar Noticia
                                                            <i class="fas fa-marker"></i>
                                                        </a>
                                                        <a onClick="javascript: return confirm('¿Quieres mandarlo al editor?');" href="./includes/doneNew_inc.php?id=<?php echo $row['NEWS_ID'] ?>" class="btn btn-secondary">Terminar Noticia
                                                            <i class="far fa-check-circle"></i>
                                                        </a>
                                                        <a class="btn btn-danger" onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/deleteNew_inc.php?id=<?php echo $row['NEWS_ID'] ?>">Eliminar Noticia
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>

                                                    </td>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>


                                <?php
                                }
                                ?>

                            </div>

                            <div class="row no-gutters ">
                                <h5 style="text-align: left;">Noticias publicadas</h5>
                                <?php

                                $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS WHERE CREATED_BY = $idRepo ORDER BY CREATION_DATE DESC";
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
                                ?>
                                    <br>
                                    <?php
                                    if (strcmp($row['NEW_STATUS'], "Publicada") == 0) {
                                    ?>
                                        <div class="col-md-4" style="background-color:<?php echo $color ?>">
                                            <img src="<?php echo $a['NEWS_TITLE']; ?>" width="150" height="250" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="background-color:<?php echo $color ?>">

                                                <h4 style="text-align: left;color: white" class="card-title">Titulo: <?php echo $row['TITLE']; ?></h4>

                                                <p style="text-align: left;color: white" class="card-text">Descripcion corta: <?php echo $row['DESCRIPTION']; ?>.</p>

                                                <p class="card-text" style="text-align: left;">
                                                    <small style="color: white">Status noticia <?php echo $row['NEW_STATUS']; ?> </small>
                                                    <br>

                                                    <small style="color: white">Firma reportero: <?php echo $row['SIGN']; ?></small>
                                                </p>
                                                <br>
                                                <a href="noticia.php?id=<?php echo $row['NEWS_ID'] ?>" class="stretched-link">Ir a noticia</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>

</body>

<?php
include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</html>