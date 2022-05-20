<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, TEXT_NEWS, CITY, SUBURB, COUNTRY, DATE_OF_NEWS, HOUR_OF_NEWS, COMMENTS_EDITOR FROM NEWS WHERE NEWS_ID = $id";
    $resultado = $mysqli->query($new);

    $newImage = "SELECT N_IMAGE_ID, NEWS_ID, NEWS_TITLE, NEWS_IMAGE, NEWS_TYPE FROM NEWS_IMAGE WHERE NEWS_ID = $id";
    $resImage = $mysqli->query($newImage);

    $newClave = "SELECT N_CLAVE_ID, NEWS_ID, NEWS_CLAVE FROM NEWS_CLAVE WHERE NEWS_ID = $id";
    $resClave = $mysqli->query($newClave);

    $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = $id";
    $resCate = $mysqli->query($newCate);
}

?>

<div class="content">
    <div class="d-flex" id="wrapper">
        <!----->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <!-- Sidebar -->
            <div class="list-group list-group-flush">
                <a href="perfilReportero.php" class="list-group-item list-group-item-action">Mi perfil
                    <i class='fas fa-tools' style='font-size:18px;color: black'></i>
                </a>
                <a href="editNoticia.php" class="list-group-item list-group-item-action">Portal de Noticias
                    <i class='far fa-hand-point-up' style='font-size:18px;color: black'></i>
                </a>
                <a href="includes/delete_inc.php?deleteid=<?php echo $id; ?>" class="list-group-item list-group-item-action">Eliminar cuenta
                    <i class='far fa-folder-open' style='font-size:18px;color: black'></i>
                </a>
                <a href="cerrarsesion.php" class="list-group-item list-group-item-action">Cerrar Sesion
                    <i class='far fa-eye' style='font-size:18px;color: black'></i>
                </a>
            </div>
        </div>

        <div class="preguntas" style="text-align: center;">
            <br>
            <h3 style="color: white" for="exampleFormControlFile1">Editar Noticia</h3>
            <br>

            <div style="text-align: center;" class="form-group">
                <br>
                <b style="color: white" for="exampleFormControlFile1">Imagenes actuales de la noticia</b>
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
            <div id="noticia" class="container-fluid text-center">

                <?php
                while ($noticia = $resultado->fetch_assoc()) {
                ?>
                    <br>
                    <br>

                    <form class="form" action="./includes/editNew_inc.php" method="post" enctype="multipart/form-data">

                        <ol></ol>
                        <div class="GroupInputFecha">
                            <b style="color: white" for="exampleFormControlFile1">Fecha de noticia: <?php echo (isset($noticia['DATE_OF_NEWS']) ? htmlspecialchars($noticia['DATE_OF_NEWS']) : ''); ?> / <?php echo (isset($noticia['HOUR_OF_NEWS']) ? htmlspecialchars($noticia['HOUR_OF_NEWS']) : ''); ?> </b>
                            <br>
                            <br>
                            <b style="color: white" for="exampleFormControlFile1">Cambie la fecha del acontecimiento</b>
                            <br>
                            <br>

                            <input type="datetime-local" placeholder="Fecha de la notica" id="date" name="date" class="form-control" required />
                        </div>

                        <ol></ol>

                        <div class="form-group">
                            <br>
                            <b style="color: white" for="exampleFormControlFile1">Selecciona la imagen preview</b>

                            <small style="color: white" for="exampleFormControlFile1">(solo png/jpg)</small>
                            <br><br>
                            <input id="imagenT" style="color: white" name="imagenT" type="file" onchange="readURT(this);">
                            <br>
                            <br>
                            <b style="color: white" for="exampleFormControlFile1">Selecciona los archivos</b>
                            <small style="color: white" for="exampleFormControlFile1">(Minimo un video)</small>
                            <br>
                            <br>
                            <input id="imagen" style="color: white" name="imagen" type="file" onchange="readURL(this);">
                            <br>
                            <input id="imagen1" style="color: white" name="imagen1" type="file" onchange="readURLL(this);">
                            <br>
                            <input id="imagen2" style="color: white" name="imagen2" type="file" onchange="readURLD(this);">
                            <br>
                            <br>
                        </div>

                        <br>

                        <div class="form-group">
                            <b style="color: white" for="exampleFormControlFile1">Añada un Titulo atractivo</b>
                            <br>
                            <br>
                            <input type="text" name="titulo" id="titulo" placeholder="Título" class="form-control" maxlength="100" value="<?php echo (isset($noticia['TITLE']) ? htmlspecialchars($noticia['TITLE']) : ''); ?>" required />
                        </div>
                        <div class="form-group">
                            <div class="li-container">

                                <br>
                                <b style="color: white" for="exampleFormControlFile1">En que pais sucedio</b>
                                <br>
                                <input style="width: 340px;" type="text" name="pais" id="pais" placeholder="Pais" maxlength="30" onkeypress="return Letra(event);" value="<?php echo (isset($noticia['COUNTRY']) ? htmlspecialchars($noticia['COUNTRY']) : ''); ?>" required />
                                <br>
                                <br>
                                <b style="color: white" for="exampleFormControlFile1">En que ciudad</b>
                                <br>
                                <input style="width: 340px;" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" maxlength="30" onkeypress="return Letra(event);" value="<?php echo (isset($noticia['CITY']) ? htmlspecialchars($noticia['CITY']) : ''); ?>" required />
                                <br>
                                <br>
                                <b style="color: white" for="exampleFormControlFile1">Y la colonia </b>
                                <br>
                                <input style="width: 340px;" type="text" name="colonia" id="colonia" placeholder="Colonia" maxlength="30" onkeypress="return Letra(event);" value="<?php echo (isset($noticia['SUBURB']) ? htmlspecialchars($noticia['SUBURB']) : ''); ?>" required />

                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <b style="color: white" for="exampleFormControlFile1">Añada una descripcion corta</b>
                            <input type="text" name="descCorta" id="descCorta" placeholder="Descripcion corta de la noticia" maxlength="50" class="form-control" value="<?php echo (isset($noticia['DESCRIPTION']) ? htmlspecialchars($noticia['DESCRIPTION']) : ''); ?>" required />
                        </div>
                        <br>
                        <div class="form-group">
                            <?php
                            $cate = "SELECT CATEGORY_ID, DESCRIPTION, COLOR FROM CATEGORIES ORDER BY DESCRIPTION ASC";
                            $res = $mysqli->query($cate);
                            ?>
                            <b style="color: white" for="exampleFormControlFile1">Selecciona la categoria</b>
                            <small style="color: white" for="exampleFormControlFile1">(Minimo una categoria)</small>
                            <select id="cbx_cate1" name="cbx_cate1">
                                <?php
                                while ($row = $res->fetch_assoc()) {
                                ?>
                                    <option value="<?php echo $row['DESCRIPTION'] ?>"><?php echo $row['DESCRIPTION'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                            <br>
                            <button type="button" class="btn-add">Agregar</button>
                            <button type="button" class="btn-add2">Limpiar</button>
                            <br> <br>
                            <div style="text-align: center;" class="li-container">
                                <?php
                                $first = true;
                                $second = true;
                                $third = true;
                                $contador = 0;
                                while ($row3 = $resCate->fetch_assoc()) {

                                    if (true === $first) {
                                ?>
                                        <input value="<?php echo (isset($row3['DESCRIPTION']) ? htmlspecialchars($row3['DESCRIPTION']) : ''); ?>" name="uno" id="uno" readonly required />
                                        <input value="<?php echo (isset($row3['N_CATE_ID']) ? htmlspecialchars($row3['N_CATE_ID']) : ''); ?>" name="unoPK" id="unoPK" hidden />
                                    <?php
                                        $first = false;
                                        $contador = 1;
                                        continue;
                                    }
                                    if (true === $second) {
                                    ?>
                                        <input value="<?php echo (isset($row3['DESCRIPTION']) ? htmlspecialchars($row3['DESCRIPTION']) : ''); ?>" name="dos" id="dos" readonly />
                                        <input value="<?php echo (isset($row3['N_CATE_ID']) ? htmlspecialchars($row3['N_CATE_ID']) : ''); ?>" name="dosPK" id="dosPK" hidden />
                                    <?php
                                        $second = false;
                                        $contador = 2;
                                        continue;
                                    }

                                    if (true === $third) {
                                    ?>
                                        <input value="<?php echo (isset($row3['DESCRIPTION']) ? htmlspecialchars($row3['DESCRIPTION']) : ''); ?>" name="tres" id="tres" readonly />
                                        <input value="<?php echo (isset($row3['N_CATE_ID']) ? htmlspecialchars($row3['N_CATE_ID']) : ''); ?>" name="tresPK" id="tresPK" hidden />
                                    <?php
                                        $third = false;
                                        $contador = 3;
                                        continue;
                                    }
                                }

                                if ($contador == 1) {
                                    ?>
                                    <input value="" name="dos" id="dos" readonly />
                                    <input value="" name="dosPK" id="dosPK" hidden />
                                    <input value="" name="tres" id="tres" readonly />
                                    <input value="" name="tresPK" id="tresPK" hidden />
                                <?php
                                }
                                if ($contador == 2) {
                                ?>
                                    <input value="" name="tres" id="tres" readonly />
                                    <input value="" name="tresPK" id="tresPK" hidden />
                                <?php
                                }
                                ?>
                                <input value="" name="limpiado" id="limpiado" hidden />
                            </div>
                            <br>
                        </div>

                        <div class="form-group">
                            <b style="color: white" for="exampleFormControlFile1">Agregue Descripcion</b>
                            <br>
                            <br>
                            <textarea name="desc" id="desc" type="text" placeholder="Descripción" class="form-control" maxlength="600" style="height: 300px;" required><?php echo (isset($noticia['TEXT_NEWS']) ? htmlspecialchars($noticia['TEXT_NEWS']) : ''); ?></textarea>

                        </div>

                        <div class="form-group">
                            <br>
                            <br>
                            <b style="color: white" for="exampleFormControlFile1">Agregar palabra clave</b>
                            <small style="color: white" for="exampleFormControlFile1">(Minimo una palabra)</small>
                            <br>
                            <br>
                            <input type="text" name="claveWord" id="claveWord" onkeypress="return Letra(event);" maxlength="100" placeholder="Palabras Clave" class="form-control">
                            <br>
                            <button type="button" class="btn-add3">Agregar</button>
                            <button type="button" class="btn-add4">Limpiar</button>
                            <br>
                            <br>
                            <div style="text-align: center;" class="li-container">
                                <?php
                                $first = true;
                                $second = true;
                                $third = true;
                                $contador = 0;
                                while ($row4 = $resClave->fetch_assoc()) {

                                    if (true === $first) {
                                ?>
                                        <input value="<?php echo (isset($row4['NEWS_CLAVE']) ? htmlspecialchars($row4['NEWS_CLAVE']) : ''); ?>" name="claveU" id="claveU" readonly required />
                                        <input value="<?php echo (isset($row4['N_CLAVE_ID']) ? htmlspecialchars($row4['N_CLAVE_ID']) : ''); ?>" name="claveUPK" id="claveUPK" hidden />
                                    <?php
                                        $first = false;
                                        $contador = 1;
                                        continue;
                                    }
                                    if (true === $second) {
                                    ?>
                                        <input value="<?php echo (isset($row4['NEWS_CLAVE']) ? htmlspecialchars($row4['NEWS_CLAVE']) : ''); ?>" name="claveD" id="claveD" readonly />
                                        <input value="<?php echo (isset($row4['N_CLAVE_ID']) ? htmlspecialchars($row4['N_CLAVE_ID']) : ''); ?>" name="claveDPK" id="claveDPK" hidden />
                                    <?php
                                        $second = false;
                                        $contador = 2;
                                        continue;
                                    }

                                    if (true === $third) {
                                    ?>
                                        <input value="<?php echo (isset($row4['NEWS_CLAVE']) ? htmlspecialchars($row4['NEWS_CLAVE']) : ''); ?>" name="claveT" id="claveT" readonly />
                                        <input value="<?php echo (isset($row4['N_CLAVE_ID']) ? htmlspecialchars($row4['N_CLAVE_ID']) : ''); ?>" name="claveTPK" id="claveTPK" hidden />
                                    <?php
                                        $third = false;
                                        $contador = 3;
                                        continue;
                                    }
                                }

                                if ($contador == 1) {
                                    ?>
                                    <input value="" name="claveD" id="claveD" readonly />
                                    <input value="" name="claveDPK" id="claveDPK" hidden />

                                    <input value="" name="claveT" id="claveT" readonly />
                                    <input value="" name="claveTPK" id="claveTPK" hidden />
                                <?php
                                }
                                if ($contador == 2) {
                                ?>
                                    <input value="" name="claveT" id="claveT" readonly />
                                    <input value="" name="claveTPK" id="claveTPK" hidden />
                                <?php
                                }
                                ?>
                                <input value="" name="limpiado1" id="limpiado1" hidden />
                            </div>
                        </div>
                        <br>
                        <label for="exampleInputEmail1 font-weight-bold">¿Es noticia urgente?</label> <br>
                        <div class="form-group mb-2 form-check-inline">

                            <br>
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="urgente" id="urgente">
                            <label class="form-check-label" for="inlineCheckbox1">Si</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="0" name="urgente" id="urgente" checked>
                            <label class="form-check-label" for="inlineCheckbox2">No</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <b style="color: white" for="user-email-id">Firma del editor</b>
                            <br>
                            <br>
                            <input type="text" name="firma" id="firma" placeholder="Firma del editor" class="form-control" value="<?php echo (isset($noticia['SIGN']) ? htmlspecialchars($noticia['SIGN']) : ''); ?>" required>

                            <input type="text" name="idNew" id="idNew" class="form-control" value="<?php echo (isset($id) ? htmlspecialchars($id) : ''); ?>" hidden>
                        </div>

                        <br>
                        <div class="ctn-text" style="text-align: center;">
                            <h5 style="color: white" class="title-description">Imagenes Ingresadas</h5>
                            <br>
                            <div class="row2" id="imTitulo" name="imTitulo">
                                <div class="column2">
                                    <img class="imagenPreview" name="blah4" id="blah4" width="200" height="200"> </img>
                                </div>
                            </div>
                            <br>
                            <div class="row2">

                                <div class="column2">
                                    <img class="imagenPreview" id="blah" width="200" height="200"> </img>

                                </div>
                                <div class="column2">
                                    <img class="imagenPreview" id="blah2" width="200" height="200"> </img>

                                </div>
                                <div class="column2">
                                    <img class="imagenPreview" id="blah3" width="200" height="200"> </img>

                                </div>
                            </div>

                        </div>
                        <ol>
                            <br>
                            <br>
                            <div class="botonBonito">
                                <button type="submit" name="submit" id="submit" class="btn btn-info">Publicar</button>
                            </div>
                        </ol>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>

    <?php
    $new = NULL;
    $newImage = NULL;
    $newClave = NULL;
    $newCate = NULL;
    $cate = NULL;
    ?>

</div>

<script src="js/registro.js"></script>
<script src="js/categoria2.js"> </script>

<script type="text/javascript">
    function readURT(input) {

        var fileInput = document.getElementById('imagenT');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Archivo no valido wn!!');
            fileInput.value = '';
            return false;
        } else {
            if (input.files)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah4').attr('src', e.target.result);

                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }

    }

    function readURL(input) {

        var fileInput = document.getElementById('imagen');
        var filePath = fileInput.value;
        var filePath2 = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.mp4)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Archivo no valido wn!!');
            fileInput.value = '';
            return false;
        } else {


            if (input.files)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);

                    }
                    reader.readAsDataURL(input.files[0]);
                }

        }

    }

    function readURLL(input) {

        var fileInput = document.getElementById('imagen1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.mp4)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Archivo no valido wn!!');
            fileInput.value = '';
            return false;
        } else {
            if (input.files)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }


    }

    function readURLD(input) {

        var fileInput = document.getElementById('imagen2');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.mp4)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Archivo no valido wn!!');
            fileInput.value = '';
            return false;
        } else {
            if (input.files)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah3').attr('src', e.target.result);

                    }
                    reader.readAsDataURL(input.files[0]);
                }
        }


    }
</script>

</body>

<?php
include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</html>