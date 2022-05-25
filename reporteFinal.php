<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$Fecha1 = $_GET["Fecha1"];
$Fecha2 = $_GET["Fecha2"];
$Cate = $_GET["Cate"];
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
                <a href="crearCate.php" class="list-group-item list-group-item-action">Crear Secciones(Categorias)
                    <i class='far fa-save' style='font-size:18px;color: black'></i>
                </a>
                <a href="editarUser.php" class="list-group-item list-group-item-action">Crear/Eliminar Usuarios
                    <i class='far fa-address-card' style='font-size:18px;color: black'></i>
                </a>
                <a href="aprobarNew.php" class="list-group-item list-group-item-action">Aprobar Noticias
                    <i class='fas fa-pencil-alt' style='font-size:18px;color: black'></i>
                </a>
                <a href="reporte.php" class="list-group-item list-group-item-action">Reporte Noticias/Secciones
                    <i class='fas fa-pencil-alt' style='font-size:18px;color: black'></i>
                </a>
                <a href="cerrarsesion.php" class="list-group-item list-group-item-action">Cerrar Sesion
                    <i class='far fa-eye' style='font-size:18px;color: black'></i>
                </a>
            </div>
        </div>

        <div class="container p-4">
            <div class="row">
                <h3 style="text-align: center;" for="exampleFormControlFile1">Reporte de Noticias/Secciones</h3>
                <br>
                <br>
                <br>
                <br>
                <div class="col-md-12">
                    <h5 style="text-align: center;" for="exampleFormControlFile1">Noticia</h5>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Secciones</th>
                                <th>Fecha</th>
                                <th>Noticia</th>
                                <th>Cantidad Likes</th>
                                <th>Cantidad Comentarios</th>
                                <th>Ir a Noticia</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (strcmp($Cate, "Todas") != 0) {

                                $cate2 = "SELECT * FROM NEWS_CATEGORIES WHERE CATE_ID = '$Cate'";
                                $category2 = $mysqli->query($cate2);
                                $cate2 = NULL;

                                while ($row8 = mysqli_fetch_assoc($category2)) {

                                    $idNoticia = $row8['NEWS_ID'];

                                    $noticias = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' AND NEWS_ID = '$idNoticia' ORDER BY LIKES DESC";
                                    $resNews = $mysqli->query($noticias);
                                    $noticias = NULL;

                                    while ($row2 = mysqli_fetch_assoc($resNews)) {

                                        $idNews = $row2['NEWS_ID'];
                            ?>
                                        <tr>
                                            <td>
                                                <?php

                                                $newCate1 = "SELECT NEWS_ID, DESCRIPTION FROM NEWS_CATEGORIES WHERE NEWS_ID = '$idNews'";
                                                $resNews1 = $mysqli->query($newCate1);
                                                $newCate1 = NULL;
                                                while ($row3 = mysqli_fetch_assoc($resNews1)) {
                                                ?>
                                                    <?php echo $row3['DESCRIPTION']; ?>

                                                    <br>
                                                <?php
                                                }
                                                ?>
                                            </td>

                                            <td><?php echo $row2['CREATION_DATE']; ?></td>
                                            <td><?php echo $row2['TITLE']; ?></td>
                                            <td><?php echo $row2['LIKES']; ?></td>

                                            <?php
                                            $coment = "SELECT COUNT(*) FROM COMMENT WHERE FK_NEWS='$idNews'";
                                            $resComent = $mysqli->query($coment);
                                            $coment = NULL;

                                            while ($row7 = mysqli_fetch_array($resComent)) {

                                                $cantCom = $row7['COUNT(*)'];
                                            }
                                            ?>
                                            <td><?php echo $cantCom; ?></td>
                                            <td align="center">
                                                <a href="noticia.php?id=<?php echo $idNews ?>" class="btn btn-secondary">
                                                    <i class="fas fa-cat"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    $i = NULL;
                                    $resNewsCate = NULL;
                                    $resNews = NULL;
                                    $resNews1 = NULL;
                                    $category = NULL;
                                    $resultado = NULL;
                                }
                            } else {

                                $noticias = "SELECT * FROM NEWS WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' ORDER BY LIKES DESC";
                                $resNews = $mysqli->query($noticias);
                                $noticias = NULL;

                                while ($row2 = mysqli_fetch_assoc($resNews)) {

                                    $idNews = $row2['NEWS_ID'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php

                                            $newCate1 = "SELECT NEWS_ID, DESCRIPTION FROM NEWS_CATEGORIES WHERE NEWS_ID = '$idNews'";
                                            $resNews1 = $mysqli->query($newCate1);
                                            $newCate1 = NULL;
                                            while ($row3 = mysqli_fetch_assoc($resNews1)) {
                                            ?>
                                                <?php echo $row3['DESCRIPTION']; ?>

                                                <br>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                        <td><?php echo $row2['CREATION_DATE']; ?></td>
                                        <td><?php echo $row2['TITLE']; ?></td>
                                        <td><?php echo $row2['LIKES']; ?></td>

                                        <?php
                                        $coment = "SELECT COUNT(*) FROM COMMENT WHERE FK_NEWS='$idNews'";
                                        $resComent = $mysqli->query($coment);
                                        $coment = NULL;

                                        while ($row7 = mysqli_fetch_array($resComent)) {

                                            $cantCom = $row7['COUNT(*)'];
                                        }
                                        ?>
                                        <td><?php echo $cantCom; ?></td>
                                        <td align="center">
                                            <a href="noticia.php?id=<?php echo $idNews ?>" class="btn btn-secondary">
                                                <i class="fas fa-cat"></i>
                                            </a>
                                        </td>

                                    </tr>
                            <?php
                                }
                                $i = NULL;
                                $resNewsCate = NULL;
                                $resNews = NULL;
                                $resNews1 = NULL;
                                $category = NULL;
                                $resultado = NULL;
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <h5 style="text-align: center;" for="exampleFormControlFile1">Secciones</h5>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Secciones</th>
                                <th>Fecha</th>
                                <th>Cantidad Vistas</th>
                                <th>Ir a Seccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (strcmp($Cate, "Todas") == 0) {
                                $cate = "SELECT * FROM CATEGORIES WHERE CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' ORDER BY VIEWS DESC";
                                $category = $mysqli->query($cate);
                                $cate = NULL;
                            } else {
                                $cate = "SELECT * FROM CATEGORIES WHERE CATEGORY_ID = '$Cate' AND CREATION_DATE BETWEEN '$Fecha1' AND '$Fecha2' ORDER BY VIEWS DESC";
                                $category = $mysqli->query($cate);
                                $cate = NULL;
                            }

                            while ($row = mysqli_fetch_assoc($category)) {

                                $color = $row['COLOR'];
                            ?>
                                <tr>
                                    <td style="background-color:<?php echo $color ?>"><?php echo $row['DESCRIPTION']; ?></td>
                                    <td style="background-color:<?php echo $color ?>"><?php echo $row['CREATION_DATE']; ?></td>
                                    <td style="background-color:<?php echo $color ?>"><?php echo $row['VIEWS']; ?></td>
                                    <td align="center">
                                        <a href="cateIndex.php?id=<?php echo $row['DESCRIPTION'] ?>" class="btn btn-secondary">
                                            <i class="fas fa-cat"></i>
                                        </a>
                                    </td>

                                </tr>
                            <?php
                            }
                            $category = NULL;
                            $resultado = NULL;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>
<script src="js/reporte.js"></script>

</body>

<?php
include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</html>