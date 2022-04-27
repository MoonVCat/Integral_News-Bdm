<?php
session_start();
include 'C:\xampp\htdocs\proyecto\templatess\headerPerfil.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

$id =  $_SESSION["USER_ID"];
$image = $_SESSION["image"];
$username = $_SESSION["username"];
$email = $_SESSION["user_login"];
$phone = $_SESSION["phone"];
$infoU = $_SESSION["infoU"];
$nombreCom = $_SESSION["nombreCom"];

?>

<div class="content">
  <!----->
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">

        <?php

        if ($_SESSION["user_type"] == 1) {
        ?>
          <a href="perfilEditor.php" class="list-group-item list-group-item-action">Perfil
            <i class='fas fa-tools' style='font-size:18px;color: black'></i>
          </a>
          <a href="aprobarNew.php" class="list-group-item list-group-item-action">Aprobar Noticias
            <i class='fas fa-pencil-alt' style='font-size:18px;color: black'></i>
          </a>
        <?php
        } else if ($_SESSION["user_type"] == 2) {
        ?>
          <a href="perfilReportero.php" class="list-group-item list-group-item-action">Perfil
            <i class='fas fa-tools' style='font-size:18px;color: black'></i>
          </a>
          <a class="list-group-item list-group-item-action" onClick="javascript: return confirm('Seguro q te quieres ir? :c etto etto');" href="includes/delete_inc.php?deleteid=<?php echo $id; ?>">Eliminar cuenta
            <i class='far fa-folder-open' style='font-size:18px;color: black'></i>
          </a>
        <?php
        } else if ($_SESSION["user_type"] == 3) {
        ?>
          <a href="perfilUsuario.php" class="list-group-item list-group-item-action">Perfil
            <i class='fas fa-tools' style='font-size:18px;color: black'></i>
          </a>
          <a class="list-group-item list-group-item-action" onClick="javascript: return confirm('Seguro q te quieres ir? :c etto etto');" href="includes/delete_inc.php?deleteid=<?php echo $id; ?>">Eliminar cuenta
            <i class='far fa-folder-open' style='font-size:18px;color: black'></i>
          </a>
        <?php
        }
        ?>


        <a href="cerrarsesion.php" class="list-group-item list-group-item-action">Cerrar Sesion
          <i class='far fa-eye' style='font-size:18px;color: black'></i>
        </a>
      </div>
    </div>


    <div class="preguntas">
      <div class="container text-center">

        <div class="content-profile-page">
          <div class="profile-user-page card">
            <div class="img-user-profile">

              <div class="img-user-profile">
                <img class="profile-bgHome" src="https://www.sbs.com.au/yourlanguage/sites/sbs.com.au.yourlanguage/files/podcast_images/sbs_04.jpg" />
                <img class="avatar" src='<?php echo $image; ?>' alt="jofpin" />
              </div>
              <div class="user-profile-data">

                <h1>
                  <?php
                  echo '<a>' . $username . '</a>';
                  ?>
                </h1>
                <br>
                <?php
                echo '<h4>' . $nombreCom . '</h4>';
                ?>


                <p>
                  <?php
                  echo '<a>' . $phone . '</a>';
                  ?>
                </p>
                <p>Firma</p>
                <p>
                  <?php
                  echo '<a>' . $email . '</a>';
                  ?>
                </p>

              </div>
              <div class="description-profile">
                <h6>-Acerca de mi-</h6>
                <?php
                echo '<a>' . $infoU . '</a>';
                ?>
              </div>

              <!--------------------------------------------------------- mis noticias --------------------------------------------------------->

              <div class="container text-center">
                <hr>
                <h4>Modificar mis datos</h4>
                </hr>

                <form class="form" action="./includes/config_inc.php" method="post" enctype="multipart/form-data">
                  <!-- Page Content -->
                  <div id="page-content-wrapper">
                    <br>
                    <br>

                    <div class="form-group">
                      <label for="user-name-id">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" maxlength="100" onkeypress="return Letra(event);" value="<?php echo (isset($username) ? htmlspecialchars($username) : ''); ?>" required="required" />

                    </div>
                    <div class="form-group">
                      <label for="user-name-id">Nombre Completo</label>
                      <input type="text" class="form-control" id="nameCom" name="nameCom" placeholder="Nombre completo" maxlength="200" onkeypress="return Letra(event);" value="<?php echo (isset($nombreCom) ? htmlspecialchars($nombreCom) : ''); ?>" />
                    </div>
                    <div class="form-group">
                      <label for="user-name-id">Numero de contacto</label>
                      <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefono" minlength="8" maxlength="12" onkeypress="return Numero(event);" value="<?php echo (isset($phone) ? htmlspecialchars($phone) : ''); ?>" required="required" />
                    </div>
                    <div class="form-group">
                      <label for="user-email-id">Correo electronico</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="emailHelp" maxlength="200" value="<?php echo (isset($email) ? htmlspecialchars($email) : ''); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="user-pass-id">Contraseña</label>
                      <input type="password" name="pass1" id="pass1" placeholder="Contraseña" class="form-control" id="user-pass-id" minlength="8" maxlength="200" required><i class="far fa-eye" id="togglePassword" cursor: pointer;"></i>
                    </div>
                    <div class="form-group">
                      <label for="user-pass-id">Confirmar contraseña</label>
                      <input type="password" name="pass2" id="pass2" placeholder="Confirmar contraseña" class="form-control" id="user-pass-id" minlength="8" maxlength="200" required><i class="far fa-eye" id="togglePassword1" cursor: pointer;"></i>
                    </div>
                    <ol></ol>

                    <div class="form-group">
                      <textarea type="text" name="info" id="info" publi="" pa="" placeholder="Sobre mi" class="form-control" style="height: 300px;" maxlength="300" value="<?php echo (isset($infoU) ? htmlspecialchars($infoU) : ''); ?>"></textarea>
                    </div>

                    <ol>
                      <br>
                      <label for="">Foto de perfil</label>
                      <input id="imagen" name="imagen" type="file" onchange="readURL(this);" />
                      <hr>

                      <h3 class="title-description">Foto de Perfil</h3>
                      <br>
                      <img class="imagenPreview" id="blah" width="300" height="350" />
                      <hr>

                  </div>
                  <input type="submit" name="submit" value="Guardar cambios" class="submit_button">
                  <hr>
                  </ol>
                </form>
              </div>
            </div>
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

<!-- 
<script>
  window.onbeforeunload = function() {

    sessionStorage.setItem("name", $('#username').val());
    sessionStorage.setItem("nameCompleto", $('#nameCom').val());
    sessionStorage.setItem("informacion", $('#info').val());
    sessionStorage.setItem("correo", $('#email').val());
    sessionStorage.setItem("phone", $('#telephone').val());

  }

  window.onload = function() {

    var name = sessionStorage.getItem('name');
    var nombreCom = sessionStorage.getItem('nameCompleto');
    var info = sessionStorage.getItem('informacion');
    var email = sessionStorage.getItem('correo');
    var phone = sessionStorage.getItem('phone');
    var imagen = sessionStorage.getItem('image');
    if (name !== null) $('#username').val(name);
    if (email !== null) $('#email').val(email);
    if (nombreCom !== null) $('#nameCom').val(nombreCom);
    if (info !== null) $('#info').val(info);
    if (phone !== null) $('#telephone').val(phone);
    if (imagen !== null) $('#imagen').val(imagen);
  }
</script>
-->

<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>

</body>

<?php
include 'C:\xampp\htdocs\proyecto\templatess\footer.php';
?>

</html>