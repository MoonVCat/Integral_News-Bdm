<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$email = $_SESSION["user_login"];
$color = "SELECT COLOR_ID, COLOR FROM COLORS ORDER BY COLOR ASC";
$resultado = $mysqli->query($color);
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

        <div class="preguntas">
            <div id="noticia" class="container-fluid text-center">

                <br>
                <br>

                <form class="form" action="./includes/new_inc.php" method="post" enctype="multipart/form-data">
                    <h3 style="color: white" for="exampleFormControlFile1">Crear Noticia</h3>
                    <br>
                    <ol></ol>
                    <div class="GroupInputFecha">
                        <b style="color: white" for="exampleFormControlFile1">Selecciona la fecha del acontecimiento</b>
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
                        <input id="imagenT" style="color: white" name="imagenT" type="file" onchange="readURT(this);" required>
                        <br>
                        <br>
                        <b style="color: white" for="exampleFormControlFile1">Selecciona los archivos</b>
                        <small style="color: white" for="exampleFormControlFile1">(Minimo un video)</small>
                        <br>
                        <br>
                        <input id="imagen" style="color: white" name="imagen" type="file" onchange="readURL(this);" required>
                        <br>
                        <input id="imagen1" style="color: white" name="imagen1" type="file" onchange="readURLL(this);">
                        <br>
                        <input id="imagen2" style="color: white" name="imagen2" type="file" onchange="readURLD(this);">
                    </div>

                    <br>

                    <div class="form-group">
                        <b style="color: white" for="exampleFormControlFile1">Añada un Titulo atractivo</b>
                        <br>
                        <br>
                        <input type="text" name="titulo" id="titulo" placeholder="Título" class="form-control" maxlength="100" required />
                    </div>
                    <div class="form-group">
                        <div class="li-container">

                            <br>
                            <b style="color: white" for="exampleFormControlFile1">En que pais sucedio</b>
                            <br>
                            <input style="width: 340px;" type="text" name="pais" id="pais" placeholder="Pais" maxlength="30" onkeypress="return Letra(event);" required />

                            <br>
                            <b style="color: white" for="exampleFormControlFile1">En que ciudad</b>
                            <br>
                            <input style="width: 340px;" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" maxlength="30" onkeypress="return Letra(event);" required />

                            <br>
                            <b style="color: white" for="exampleFormControlFile1">Y la colonia </b>
                            <br>
                            <input style="width: 340px;" type="text" name="colonia" id="colonia" placeholder="Colonia" maxlength="30" onkeypress="return Letra(event);" required />

                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <b style="color: white" for="exampleFormControlFile1">Añada una descripcion corta</b>
                        <input type="text" name="descCorta" id="descCorta" placeholder="Descripcion corta de la noticia" maxlength="50" class="form-control" required />
                    </div>
                    <br>
                    <div class="form-group">
                        <?php
                        $cate = "SELECT CATEGORY_ID, DESCRIPTION, COLOR FROM CATEGORIES ORDER BY DESCRIPTION ASC";
                        $resultado = $mysqli->query($cate);
                        ?>
                        <b style="color: white" for="exampleFormControlFile1">Selecciona la categoria</b>
                        <small style="color: white" for="exampleFormControlFile1">(Minimo una categoria)</small>
                        <select id="cbx_cate1" name="cbx_cate1">
                            <?php
                            while ($row = $resultado->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['DESCRIPTION'] ?>"><?php echo $row['DESCRIPTION'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br>
                        <br>
                        <button class="btn-add">Agregar</button>
                        <button class="btn-add2">Limpiar</button>
                        <br> <br>
                        <div style="text-align: center;" class="li-container">

                            <input value="" name="uno" id="uno" readonly required />

                            <input value="" name="dos" id="dos" readonly />

                            <input value="" name="tres" id="tres" readonly />

                        </div>
                        <br>
                    </div>

                    <div class="form-group">
                        <b style="color: white" for="exampleFormControlFile1">Agregue Descripcion</b>
                        <br>
                        <br>
                        <textarea name="desc" id="desc" type="text" placeholder="Descripción" class="form-control" maxlength="800" style="height: 300px;" required></textarea>
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
                        <button class="btnA">Agregar</button>
                        <button class="btnA2">Limpiar</button>
                        <div style="text-align: center;" class="li-container">
                            <br>
                                    <input value="" name="claveU" id="claveU" readonly required />
                                
                                    <input value="" name="claveD" id="claveD" readonly />
                                
                                    <input value="" name="claveT" id="claveT" readonly />
                               
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <b style="color: white" for="user-email-id">Firma del editor</b>
                        <br>
                        <br>
                        <input type="text" name="firma" id="firma" placeholder="Firma del editor" class="form-control" value="<?php echo (isset($email) ? htmlspecialchars($email) : ''); ?>" >
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
                            <button type="submit" name="submit" class="btn btn-info">Publicar</button>
                        </div>
                    </ol>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>
<script src="js/categoria.js"> </script>
<script src="js/claveWord.js"> </script>

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

<script>
    $(".readonly").keydown(function(e) {
        e.preventDefault();
    });
</script>

<script>
    window.onbeforeunload = function() {
        sessionStorage.setItem("date", $('#date').val());
        sessionStorage.setItem("title", $('#titulo').val());
        sessionStorage.setItem("country", $('#pais').val());
        sessionStorage.setItem("city", $('#ciudad').val());
        sessionStorage.setItem("suburb", $('#colonia').val());
        sessionStorage.setItem("shortDesc", $('#descCorta').val());
        sessionStorage.setItem("one", $('#uno').val());
        sessionStorage.setItem("two", $('#dos').val());
        sessionStorage.setItem("three", $('#tres').val());
        sessionStorage.setItem("description", $('#desc').val());
        sessionStorage.setItem("wordClave", $('#claveU').val());
        sessionStorage.setItem("wordClave1", $('#claveD').val());
        sessionStorage.setItem("wordClave2", $('#claveT').val());


    }

    window.onload = function() {
        var hour = sessionStorage.getItem('hour');
        var date = sessionStorage.getItem('date');
        var title = sessionStorage.getItem('title');
        var country = sessionStorage.getItem('country');
        var city = sessionStorage.getItem('city');
        var suburb = sessionStorage.getItem('suburb');
        var shortDesc = sessionStorage.getItem('shortDesc');
        var one = sessionStorage.getItem('one');
        var two = sessionStorage.getItem('two');
        var three = sessionStorage.getItem('three');
        var description = sessionStorage.getItem('description');
        var wordClave = sessionStorage.getItem('wordClave');
        var wordClave1 = sessionStorage.getItem('wordClave1');
        var wordClave2 = sessionStorage.getItem('wordClave2');

        if (date !== null) $('#date').val(date);
        if (title !== null) $('#titulo').val(title);
        if (country !== null) $('#pais').val(country);
        if (city !== null) $('#ciudad').val(city);
        if (suburb !== null) $('#colonia').val(suburb);
        if (shortDesc !== null) $('#descCorta').val(shortDesc);
        if (one !== null) $('#uno').val(one);
        if (two !== null) $('#dos').val(two);
        if (three !== null) $('#tres').val(three);
        if (description !== null) $('#desc').val(description);
        if (wordClave !== null) $('#claveU').val(wordClave);
        if (wordClave1 !== null) $('#claveD').val(wordClave1);
        if (wordClave2 !== null) $('#claveT').val(wordClave2);
    }
</script>

</body>

<?php
include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</html>