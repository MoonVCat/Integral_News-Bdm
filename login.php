<?php
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

session_start();
?>

<div class="content">
    <div class="container-all">
        <div class="ctn-form">
            <img src="https://www.netclipart.com/pp/m/141-1415290_renewal-massage-studio-home-blue-lotus-flower-logo.png" alt="" class="logo">
            <h1 class="title">Iniciar Sesión</h1>


            <form class="form" action="./includes/login_inc.php" method="post">
                <label for="">Email</label>
                <input type="email" name="email" id="email" maxlength="200" placeholder="Correo Electronico" required>
                <br>
                <label for="">Contraseña</label>
                <input type="password" name="pass1" id="pass1" maxlength="200" placeholder="Contraseña" required><i class="far fa-eye" id="togglePassword" cursor: pointer;"></i>


                <input type="submit" name="submit" value="Iniciar Sesion" class="submit_button">

            </form>

            <span class="text-footer">¿Aún no te has regsitrado?
                <a href="registro.php">Registrate</a>
            </span>
        </div>

        <div class="ctn-text">
            <div class="capa">

            </div>
        </div>
    </div>
</div>


<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#pass1');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
</script>


<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>