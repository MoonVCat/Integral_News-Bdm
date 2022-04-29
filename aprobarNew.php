<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';
?>

<div class="content">

    <div class="d-flex" id="wrapper">
        <!----->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <!-- Sidebar -->
            <div class="list-group list-group-flush">

                <a href="perfilEditor.php" class="list-group-item list-group-item-action">Perfil
                    <i class='fas fa-tools' style='font-size:18px;color: black'></i>
                </a>
                <a href="editarUser.php" class="list-group-item list-group-item-action">Crear/Eliminar Usuarios
                    <i class='far fa-address-card' style='font-size:18px;color: black'></i>
                </a>
                <a href="aprobarNew.php" class="list-group-item list-group-item-action">Aprobar Noticias
                    <i class='fas fa-pencil-alt' style='font-size:18px;color: black'></i>
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

                                <?php

                                $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS ORDER BY CREATION_DATE DESC";
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

                                    <h5 style="text-align: left;">Noticias en aprobacion</h5>
                                    <br>
                                    <br>
                                    <?php
                                    if (strcmp($row['NEW_STATUS'], "Terminada") == 0) {
                                    ?>
                                        <div class="col-md-4" style="background-color:<?php echo $color ?>">
                                            <a href="prevNew.php?id=<?php echo $row['NEWS_ID'] ?>">
                                                <img src="<?php echo $a['NEWS_TITLE']; ?>" width="150" height="250" class="card-img" alt="...">
                                            </a>

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="background-color:<?php echo $color ?>">

                                                <h4 style="text-align: left;" class="card-title">Titulo: <?php echo $row['TITLE']; ?></h4>

                                                <p style="text-align: left;" class="card-text">Descripcion corta: <?php echo $row['DESCRIPTION']; ?>.</p>

                                                <p class="card-text" style="text-align: left;">
                                                    <small style="color: black">Status noticia: <?php echo $row['NEW_STATUS']; ?> </small>
                                                    <br>

                                                    <small style="color: black">Firma reportero: <?php echo $row['SIGN']; ?></small>
                                                </p>

                                                <div class="d-grid gap-2 d-flex flex-row-reverse">
                                                    <td align="right">

                                                        <a onClick="javascript: return confirm('¿Quieres publicar la noticia?');" href="./includes/doneNew_inc.php?idAprobar=<?php echo $row['NEWS_ID'] ?>" class="btn btn-secondary">Aprobar noticia
                                                            <i class="fas fa-exclamation"></i>
                                                        </a>
                                                    </td>

                                                </div>

                                                <br>
                                                <br>
                                                <div class="d-grid gap-2 d-flex flex-row-reverse">
                                                    <td align="right">

                                                        <form style="text-align: right;" class="form" action="./includes/doneNew_inc.php" method="post" enctype="multipart/form-data">
                                                            <button type="submit" name="submit" class="btn btn-secondary">Mandar a revision noticia
                                                                <i class="fas fa-wrench"></i>
                                                            </button>
                                                            <br><br>
                                                            <label for="">Escribir un comentario respecto a la noticia</label>
                                                            <input type="text" name="comen" id="comen" placeholder="Comentario" maxlength="200" style="width: 400px;" required>
                                                            <input type="text" name="idNew" id="idNew" value="<?php echo (isset($row['NEWS_ID']) ? htmlspecialchars($row['NEWS_ID']) : ''); ?>" hidden>
                                                        </form>
                                                    </td>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                <?php
                                }
                                $category = NULL;
                                $imagen = NULL;
                                $news = NULL;
                                ?>

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