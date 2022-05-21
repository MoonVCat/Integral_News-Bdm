<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\header.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';

?>

<div class="content">

  <div class="preguntas">

    <div class="preguntas">
      <figure class="text-center">
        <h1>Noticias</h1>
      </figure>

      <div class="card-deck">
        <?php

        $id = $_GET['id'];

        $categNew = "SELECT * FROM NEWS_CATEGORIES WHERE DESCRIPTION = '$id'";
        $resCateN = $mysqli->query($categNew);

        $categ2 = "SELECT * FROM CATEGORIES WHERE DESCRIPTION = '$id'";
        $resCate2 = $mysqli->query($categ2);

        $aCate = mysqli_fetch_array($resCate2);
        $vistas = $aCate['VIEWS'];

        $vistas++;

        $updateCate = "CALL SP_CATEGORIES('updateViews', '', '$id', '', '', '$vistas', '')";
        $resUpCate = $mysqli->query($updateCate);

        while ($rowCate = mysqli_fetch_assoc($resCateN)) {

          $newId = $rowCate['NEWS_ID'];

          $new = "SELECT NEWS_ID, `SIGN`, TITLE, DESCRIPTION, DATE_OF_NEWS, NEW_STATUS, CREATION_DATE, COMMENTS_EDITOR FROM NEWS where NEWS_ID = '$newId' AND NEW_STATUS = 'Publicada'";
          $news = $mysqli->query($new);
          $new = NULL;

          while ($row = mysqli_fetch_assoc($news)) {

            $idNew = $row['NEWS_ID'];

            $categ = "SELECT DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE '$idNew' = `NEWS_ID`";
            $category = $mysqli->query($categ);
            $i = mysqli_fetch_array($category);
            $color = $i['COLOR'];
            $categ = NULL;

            $img = "SELECT NEWS_TITLE FROM NEWS_IMAGE WHERE '$idNew' = `NEWS_ID`";
            $imagen = $mysqli->query($img);
            $a = mysqli_fetch_array($imagen);
            $img = NULL;

        ?>

            <div style="background-color:<?php echo $color ?>" class="row g-0 bg-light position-relative">

              <div style="background-color:<?php echo $color ?>" class="col-md-6 mb-md-0 p-md-4">
                <img src="<?php echo $a['NEWS_TITLE']; ?>" class="w-40" width="200" height="200" alt="...">
              </div>
              <div style="background-color:<?php echo $color ?>" class="col-md-6 p-4 ps-md-0">
                <?php
                $newCate = "SELECT N_CATE_ID, NEWS_ID, DESCRIPTION, COLOR FROM NEWS_CATEGORIES WHERE NEWS_ID = '$idNew'";
                $resCate = $mysqli->query($newCate);
                while ($cate = $resCate->fetch_assoc()) {
                ?>
                  <span style="background-color:<?php echo $cate['COLOR'] ?>;align-content: space-around; font-size: 90%;font-weight:bold">
                    <?php echo $cate['DESCRIPTION']; ?>
                  </span>

                <?php
                }
                ?>
                <br>
                <br>
                <h5 class="mt-0" style="color: white">Titulo: <?php echo $row['TITLE']; ?>.</h5>
                <br>
                <small style="color: white">Fecha de noticia: </small>
                <small style="color: white"><?php echo $row['DATE_OF_NEWS']; ?></small>
                <br>
                <p style="color: white">Resumen: <?php echo $row['DESCRIPTION']; ?></p>
                <a href="noticia.php?id=<?php echo $row['NEWS_ID'] ?>" class="stretched-link">Ir a noticia</a>
              </div>
            </div>

        <?php
          }
        }
        $row = NULL;
        $news = NULL;
        $category = NULL;
        $imagen = NULL;
        $newCate = NULL;
        $resCate = NULL;
        $resCate2 = NULL;
        $resCateN = NULL;
        $cate = NULL;
        $i = NULL;
        $a = NULL;

        ?>
      </div>
    </div>
  </div>

</div>

<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Principal.js"></script>

</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>

</html>