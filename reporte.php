<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$color = "SELECT COLOR_ID, COLOR FROM COLORS ORDER BY COLOR ASC";
$resultado = $mysqli->query($color);
$color = NULL;

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
                <a href="cerrarsesion.php" class="list-group-item list-group-item-action">Cerrar Sesion
                    <i class='far fa-eye' style='font-size:18px;color: black'></i>
                </a>
            </div>
        </div>

        <div class="container p-4">
            <div class="row">
                <h3 style="text-align: center;" for="exampleFormControlFile1">Filtros para Reporte</h3>
                <br>
                <br>
                <div class="col-md-4">
                    <form class="form" action="./includes/reporte_inc.php" method="post" enctype="multipart/form-data">
                        <br>
                        <br>
                        <div class="form-group">
                            <b for="exampleFormControlFile1">Selecciona la categoria</b>
                            <br>
                            <br>
                            <select class="form-select form-select-lg mb-3" name="cateCB" id="cateCB">

                                <li>
                                    <option value="Todas" class="dropdown-item">Todas</option>
                                </li>
                                <?php

                                $cate = "SELECT CATEGORY_ID, DESCRIPTION, COLOR, `ORDER` FROM CATEGORIES ORDER BY `ORDER` ASC;";
                                $category = $mysqli->query($cate);
                                while ($row = mysqli_fetch_assoc($category)) {
                                    $color = $row['COLOR'];
                                ?>
                                    <li>
                                        <option style="color: <?php echo $color ?>;" value="<?php echo $row['CATEGORY_ID'] ?>" class="dropdown-item" ><?php echo $row['DESCRIPTION']; ?></option>
                                    </li>
                                <?php
                                }
                                $cate = NULL;
                                $category = NULL;
                                ?>

                            </select>
                        </div>
                        <br>
                        <br>
                        <b for="exampleFormControlFile1">Seleccionar fecha</b>
                        <br>
                        <br>
                        <ul>
                            <b for="exampleFormControlFile1">Fecha inicial </b>
                            <input id="start" type="date" name="start" value="2022-01-01">
                            <br>
                            <br>

                            <b for="exampleFormControlFile1">Fecha final </b>
                            <input id="final" type="date" name="final" value="2022-07-22">
                        </ul>
                </div>

                <div class="botonBonito">
                    <button type="submit" name="submit" class="btn btn-info">Generar Reporte</button>
                </div>
                </form>


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