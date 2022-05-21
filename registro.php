<?php
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';
?>

<div class="content">
  <div class="container-all">

    <div class="ctn-form">
      <img src="https://www.netclipart.com/pp/m/141-1415290_renewal-massage-studio-home-blue-lotus-flower-logo.png" alt="" class="logo">

      <form class="form" action="./includes/register_inc.php" method="post" enctype="multipart/form-data">
        <h1 class="title">Registrarse</h1>

        <label for="">Nombre de Usuario</label>
        <input type="text" name="username" id="username" maxlength="100" onkeypress="return Letra(event);" required>

        <label for="">Email</label>
        <input type="email" name="email" id="email" maxlength="200" placeholder="Correo Electronico" size="20" required>

        <div>
          <label for="">Contraseña</label>
          <input type="password" name="pass1" id="pass1" placeholder="Contraseña" minlength="8" maxlength="200" required><i class="far fa-eye" id="togglePassword" cursor: pointer;"></i>
        </div>

        <div>
          <label for="">Confirmar contraseña</label>
          <input type="password" name="pass2" id="pass2" placeholder="Confirmar contraseña" minlength="8" maxlength="200" required><i class="far fa-eye" id="togglePassword1" cursor: pointer;"></i>
        </div>

        <label for="">Numero de contacto</label>
        <input type="text" name="telephone" id="telephone" onkeypress="return Numero(event);" minlength="8" maxlength="12" required>

        <br>
        <label for="exampleInputEmail1 font-weight-bold">Tipo de Usuario</label> <br>
        <div class="form-group mb-2 form-check-inline">
          <br>
          <input class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="usuario" id="usuario">
          <small class="form-check-label" for="inlineCheckbox1">Editor</small>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="2" name="usuario" id="usuario">
          <small class="form-check-label" for="inlineCheckbox2">Reportero</small>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineCheckbox2" value="3" name="usuario" id="usuario" checked>
          <small class="form-check-label" for="inlineCheckbox2">Usuario</small>
        </div>
        <br>

        <label for="">Foto de perfil</label>
        <input name="imagen" id="imagen" type="file" onchange="readURL(this);" required />
        <hr>

        <input type="submit" name="submit" value="Registrarse" class="submit_button">

      </form>

      <span class="text-footer">¿Ya tienes cuenta?
        <a href="login.php">Iniciar Sesión</a>
      </span>

    </div>

    <div class="ctn-text">
      <div class="capa"></div>
      <h1 class="title-description">Foto de Perfil</h1>

      <br>
      <br>
      <img class="imagenPreview" id="blah" width="300" height="350" />

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

<script>
  window.onbeforeunload = function() {

    sessionStorage.setItem("name", $('#username').val());
    sessionStorage.setItem("correo", $('#email').val());
    sessionStorage.setItem("phone", $('#telephone').val());

  }


  window.onload = function() {

    var name = sessionStorage.getItem('name');
    var email = sessionStorage.getItem('correo');
    var phone = sessionStorage.getItem('phone');
    if (name !== null) $('#username').val(name);
    if (email !== null) $('#email').val(email);
    if (phone !== null) $('#telephone').val(phone);

  }
</script>


<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/registro.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>