<?php
require "connection.php";

?>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" style="color:white;" href="index.php">
      <img src="https://www.netclipart.com/pp/m/141-1415290_renewal-massage-studio-home-blue-lotus-flower-logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      IntegralNews
    </a>
  </div>

  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categorias
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <?php

        $cate = "SELECT CATEGORY_ID, DESCRIPTION, COLOR, `ORDER` FROM CATEGORIES ORDER BY `ORDER` DESC;";
        $category = $mysqli->query($cate);
        while ($row = mysqli_fetch_assoc($category)) {
          $color = $row['COLOR'];
        ?>
          <li><a style="color: <?php echo $color ?>;" class="dropdown-item" href="cateIndex.php?id=<?php echo $row['DESCRIPTION'] ?>"><?php echo $row['DESCRIPTION']; ?></a></li>
        <?php
        }
        $cate = NULL;
        $category = NULL;
        ?>

      </ul>
    </li>
  </ul>

  <div class="container-fluid">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Busca tu noticia" aria-label="Search">
      <button class="btn btn-light" type="submit"> Buscar </button>
    </form>
  </div>

  <!--<a class="nav-link d-flex align-items-center" href="Perfilreportero.php"  role="button"  >Mónica Soto <img   src="http://cdn.onlinewebfonts.com/svg/img_299586.png" class="rounded-circle" height="30" alt="Avatar" loading="lazy"/></a>
-->

  <?php

  if (isset($_SESSION["user_login"])) {

    $image = $_SESSION["image"];
    if ($_SESSION["valPass"] == 2) {
      echo '<script language="javascript">alert("Por favor cambie su contraseña csm");</script>';
    }
    if ($_SESSION["user_type"] == 1) {
  ?>
      <a href="perfilEditor.php"> <img width=50 height=50 src='<?php echo $image; ?>' /></a>
    <?php
    } else if ($_SESSION["user_type"] == 2) {
    ?>
      <a href="perfilReportero.php"> <img width=50 height=50 src='<?php echo $image; ?>' /></a>
    <?php
    } else if ($_SESSION["user_type"] == 3) {
    ?>
      <a href="perfilUsuario.php"> <img width=50 height=50 src='<?php echo $image; ?>' /></a>
    <?php
    }

    echo '<a style="color:white;">' . $_SESSION["username"] . '</a>';
  } else {
    ?>
    <div class="col-auto ms-auto mt-3 ">
      <button id="btn_iniciar" class="btn btn-light" onclick="location.href='login.php'" type="submit">Iniciar Sesión</button>
      <button id="btn_registro" class="btn btn-light" onclick="location.href='registro.php'" type="submit">Registrarse</button>
    </div>
  <?php
  }
  ?>

</nav>