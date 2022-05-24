<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

?>

<div class="content">

  <div class="preguntas">

    <h1 style="text-align: center;"> Filtros Avanzados</h1>

    <form class="form" action="./includes/filtrosAvanzados_inc.php" method="post" enctype="multipart/form-data">

      <div style="text-align: center;">
        <br>
        <br>
        <h5 id="Pie3">Palabras Clave</h5>
        <br>
        <select id="cbx_clave1" name="cbx_clave1">
          
          <?php
          $clave = "SELECT * FROM NEWS_CLAVE ORDER BY `NEWS_CLAVE` ASC";
          $resClave = $mysqli->query($clave);
          $clave = NULL;
          while ($row2 = $resClave->fetch_assoc()) {
          ?>
            <option value="<?php echo $row2['NEWS_CLAVE'] ?>"><?php echo $row2['NEWS_CLAVE'] ?></option>
          <?php
          }
          $resClave = NULL;
          ?>
        </select>

        <select id="cbx_clave2" name="cbx_clave2">
          <option value="0"></option>
          <?php
          $clave = "SELECT * FROM NEWS_CLAVE ORDER BY `NEWS_CLAVE` ASC";
          $resClave = $mysqli->query($clave);
          $clave = NULL;
          while ($row2 = $resClave->fetch_assoc()) {
          ?>
            <option value="<?php echo $row2['NEWS_CLAVE'] ?>"><?php echo $row2['NEWS_CLAVE'] ?></option>
          <?php
          }
          $resClave = NULL;
          ?>
        </select>

        <select id="cbx_clave3" name="cbx_clave3">
          <option value="0"></option>
          <?php
          $clave = "SELECT * FROM NEWS_CLAVE ORDER BY `NEWS_CLAVE` ASC";
          $resClave = $mysqli->query($clave);
          $clave = NULL;
          while ($row2 = $resClave->fetch_assoc()) {
          ?>
            <option value="<?php echo $row2['NEWS_CLAVE'] ?>"><?php echo $row2['NEWS_CLAVE'] ?></option>
          <?php
          }
          $resClave = NULL;
          ?>
        </select>

      </div>


      <div style="text-align: center;">
        <br>
        <br>
        <h5 id="Pie3">Es Urgente?</h5>

        <div class="form-group mb-2 form-check-inline">
          <br>
          <input style="color: white" class="form-check-input" type="radio" id="inlineCheckbox1" value="1" name="urgente" id="urgente">
          <label class="form-check-label" for="inlineCheckbox1">Si</label>
        </div>

        <div class="form-check form-check-inline">
          <input style="color: white" class="form-check-input" type="radio" id="inlineCheckbox2" value="0" name="urgente" id="urgente" checked>
          <label class="form-check-label" for="inlineCheckbox2">No</label>
        </div>
        <br>
      </div>

      <div style="text-align: center;">
        <br>
        <br>
        <h5 for="exampleFormControlFile1">Seleccionar fecha</h5>
        <br>
        <ul>
          <b for="exampleFormControlFile1">Fecha inicial </b>
          <input id="start" type="date" name="start" value="2022-01-01">
          <br>
          <br>

          <b for="exampleFormControlFile1">Fecha final </b>
          <input id="final" type="date" name="final" value="2022-07-22">
        </ul>
        <br>
        <br>
        <h5 for="exampleFormControlFile1">Escribir Palabra</h5>
        <input type="text" id="texto" name="texto" maxlength="100" onkeypress="return Letra(event);">
        <br>
        <br>
        <br>
        <br>
        <div class="botonBonito">
          <button type="submit" name="submit" class="btn btn-info">Busqueda Avanzada</button>
        </div>
      </div>

    </form>

  </div>

</div>

<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Principal.js"></script>
<script src="js/registro.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>