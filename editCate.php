<?php

session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$color = "SELECT COLOR_ID, COLOR FROM COLORS ORDER BY COLOR ASC";
$resulColor = $mysqli->query($color);
$color = NULL;

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $catEdit = "SELECT * FROM CATEGORIES WHERE CATEGORY_ID = '$id'";
    $category = $mysqli->query($catEdit);
    
    $row2 = mysqli_fetch_array($category);

    $catEdit = NULL;
}

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
                <a href="crearCate.php" class="list-group-item list-group-item-action">Crear Secciones(Categorias)
                    <i class='far fa-save' style='font-size:18px;color: black'></i>
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
                <div class="col-md-4">

                    <div class="card card-body">

                        <form class="form" method="post" action="./includes/editCate_inc.php?id=<?php echo $row2['CATEGORY_ID'] ?>" enctype="multipart/form-data">

                            <b for="exampleFormControlFile1">Edita una seccion</b>
                            <br>
                            <br>
                            <b for="exampleFormControlFile1">Ponle nombre a la seccion</b>
                            <br>
                            <div class="form-group">
                                <input type="text" id="name_cate" name="name_cate" class="form-control" placeholder="Titulo" maxlength="100" value="<?php echo (isset($row2['DESCRIPTION']) ? htmlspecialchars($row2['DESCRIPTION']) : ''); ?>" onkeypress="return Letra(event);" autofocus required>
                            </div>
                            <br>
                            <b for="exampleFormControlFile1">Agrega un numero para el orden de la categoria</b>
                            <br>
                            <div class="form-group">
                                <input type="text" id="num_cate" name="num_cate" class="form-control" placeholder="Orden" maxlength="11" onkeypress="return Numero(event);" value="<?php echo (isset($row2['ORDER']) ? htmlspecialchars($row2['ORDER']) : ''); ?>" required>
                            </div>
                            <br>
                            <input type="hidden" id="description" name="description" class="form-control" value="<?php echo (isset($row2['DESCRIPTION']) ? htmlspecialchars($row2['DESCRIPTION']) : ''); ?>">
                            <br>
                            <div class="form-group">
                                <b for="exampleFormControlFile1">Selecciona el color</b>
                                <br>
                                <br>
                                <select class="form-select form-select-lg mb-3" id="cbx_color" name="cbx_color">

                                    <?php
                                    while ($row = $resulColor->fetch_assoc()) {
                                        $color = $row['COLOR'];
                                    ?>
                                        <option style="color: <?php echo $color ?>;" value="<?php echo $row['COLOR'] ?>"><?php echo $row['COLOR'] ?></option>
                                    <?php
                                    }

                                    $resulColor = NULL;
                                    
                                    ?>
                                </select>
                            </div>

                            <div class="botonBonito">
                                <button type="submit" name="submit" class="btn btn-info">Editar Seccion</button>
                            </div>
                        </form>
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