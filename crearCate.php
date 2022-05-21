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
                <a href="editarUser.php" class="list-group-item list-group-item-action">Crear/Eliminar Usuarios
                    <i class='far fa-save' style='font-size:18px;color: black'></i>
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
                <div class="col-md-4">

                    <div class="card card-body">
                        <form class="form" action="./includes/cate_inc.php" method="post" enctype="multipart/form-data">

                            <b for="exampleFormControlFile1">Crea una seccion</b>
                            <br>
                            <br>
                            <b for="exampleFormControlFile1">Ponle nombre a la seccion</b>
                            <br>
                            <div class="form-group">
                                <input type="text" id="name_cate" name="name_cate" class="form-control" placeholder="Titulo" maxlength="100" onkeypress="return Letra(event);" autofocus required>
                            </div>
                            <br>
                            <b for="exampleFormControlFile1">Agrega un numero para el orden de la categoria</b>
                            <br>
                            <div class="form-group">
                                <input type="text" id="num_cate" name="num_cate" class="form-control" placeholder="Orden" maxlength="11" onkeypress="return Numero(event);" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <b for="exampleFormControlFile1">Selecciona el color</b>
                                <br>
                                <br>
                                <select class="form-select form-select-lg mb-3" id="cbx_color" name="cbx_color">
                                    <?php
                                    while ($row = $resultado->fetch_assoc()) {
                                        $color = $row['COLOR'];
                                    ?>
                                        <option style="color: <?php echo $color ?>;" value="<?php echo $row['COLOR'] ?>"><?php echo $row['COLOR'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="botonBonito">
                                <button type="submit" name="submit" class="btn btn-info">Guardar Seccion</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Titulo</th>
                                <th>Color</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $cate = "SELECT CATEGORY_ID, DESCRIPTION, COLOR FROM CATEGORIES";
                            $category = $mysqli->query($cate);
                            $cate = NULL;

                            while ($row = mysqli_fetch_assoc($category)) {

                                $color = $row['COLOR'];
                            ?>
                                <tr>
                                    <td style="background-color:<?php echo $color ?>"><?php echo $row['CATEGORY_ID']; ?></td>
                                    <td style="background-color:<?php echo $color ?>"><?php echo $row['DESCRIPTION']; ?></td>
                                    <td style="background-color:<?php echo $color ?>"><?php echo $row['COLOR']; ?></td>
                                    <td align="center">
                                        <a href="editCate.php?id=<?php echo $row['CATEGORY_ID'] ?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a class="btn btn-danger" onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/deleteCate_inc.php?id=<?php echo $row['CATEGORY_ID'] ?>">
                                            <i class="far fa-trash-alt"></i>
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

</body>

<?php
include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</html>