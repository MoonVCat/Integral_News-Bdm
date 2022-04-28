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
                <div class="col-md-5">

                    <div class="editarUser">
                        <div class="card card-body">
                            <form class="form" action="./includes/register_inc.php?id=1" method="post" enctype="multipart/form-data">
                                <h1 style="text-align: center;" class="title">Crea un nuevo Reportero</h1>
                                <br>
                                <b for="">Nombre de Usuario</b>
                                <input type="text" id="username" name="username" maxlength="100" onkeypress="return Letra(event);" required>
                                <br>
                                <br>
                                <b for="">Email</b>
                                <input type="email" name="email" placeholder="Correo Electronico" maxlength="200" size="20" required>
                                <br>
                                <br>
                                <div>
                                    <b for="">Contraseña</b>
                                    <input type="password" id="pass1" name="pass1" placeholder="Contraseña" maxlength="200" required><i class="far fa-eye" id="togglePassword" cursor: pointer;"></i>
                                </div>
                                <br>
                                <div>
                                    <b for="">Confirmar contraseña</b>
                                    <input type="password" id="pass2" name="pass2" placeholder="Confirmar contraseña" maxlength="200" required><i class="far fa-eye" id="togglePassword1" cursor: pointer;"></i>
                                </div>
                                <br>
                                <b for="">Numero de contacto</b>
                                <input type="text" name="telephone" onkeypress="return Numero(event);" minlength="8" maxlength="12" required>
                                <br>
                                <br>
                                <b for="">Foto de perfil</b>
                                <input id="imagen" name="imagen" type="file" onchange="readURL(this);" required />
                                <hr>
                                <br>
                                <div class="ctn-text">
                                    <div class="capa"></div>
                                    <h1 style="text-align: center;" class="title-description">Foto de Perfil</h1>

                                    <br>
                                    <img class="imagenPreview" id="blah" width="300" height="350" />

                                </div>

                                <br>
                                <br>
                                <div class="botonBonito">
                                    <button type="submit" name="submit" class="btn btn-info">Crear Perfil</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <br>
                    <br>
                    <div class="tablita">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $user = "SELECT USER_ID, EMAIL, USER_TYPE_ID, USERNAME FROM USERS";
                                $users = $mysqli->query($user);
                                $user = NULL;

                                while ($row = mysqli_fetch_assoc($users)) {

                                    if ($row['USER_TYPE_ID'] == 2) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['USER_ID']; ?></td>
                                            <td><?php echo $row['EMAIL']; ?></td>
                                            <td><?php echo $row['USERNAME']; ?></td>
                                            <td align="center">

                                                <a class="btn btn-danger" onClick="javascript: return confirm('¿Querei borrar esto wn?');" href="./includes/delete_inc.php?id=<?php echo $row['USER_ID'] ?>">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                $users = NULL;
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



<script type="text/javascript">
    function readURL(input) {

        var fileInput = document.getElementById('imagen');
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
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
        }

    }
</script>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#pass1');
    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#pass2');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type);

        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>


<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>

<?php

include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</body>

</html>