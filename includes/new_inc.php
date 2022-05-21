<?php
require 'C:\xampp\htdocs\proyecto\connection.php';
include "../contr/newcontr.classes.php";
include "../contr/new2contr.classes.php";
include "../contr/imagecontr.classes.php";

if (isset($_POST["submit"])) {

    $titulo = $_POST["titulo"];
    $pais = $_POST["pais"];
    $ciudad = $_POST["ciudad"];
    $colonia = $_POST["colonia"];
    $descCorta = $_POST["descCorta"];
    $desc = $_POST["desc"];
    $firma = $_POST["firma"];
    $idUser = $_SESSION["USER_ID"];
    $fecha = $_POST["date"];
    $urgente = $_POST["urgente"];
    $edicion = 0;
    $mp4 = "mp4";

    $date = substr($fecha, 0, 10);
    $hora = substr($fecha, -5);

    //echo "<script> alert('".$hora."'); </script>";
    //echo "<script> alert('".$date."'); </script>";

        if (!empty($_FILES["imagenT"]["name"])) {
            $fileName3 = basename($_FILES["imagenT"]["name"]);
            $imageType3 = strtolower(pathinfo($fileName3, PATHINFO_EXTENSION));
        }
    
        if (!empty($_FILES["imagen"]["name"])) {
            $fileName = basename($_FILES["imagen"]["name"]);
            $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        }

        if (!empty($_FILES["imagen1"]["name"])) {
            $fileName1 = basename($_FILES["imagen1"]["name"]);
            $imageType1 = strtolower(pathinfo($fileName1, PATHINFO_EXTENSION));

        }
        if (!empty($_FILES["imagen2"]["name"])) {
            $fileName2 = basename($_FILES["imagen2"]["name"]);
            $imageType2 = strtolower(pathinfo($fileName2, PATHINFO_EXTENSION));
        }
        
    if(strcmp($imageType, $mp4) == 0 || strcmp($imageType1, $mp4) == 0 || strcmp($imageType2, $mp4) == 0){

        $new = new NewContr($hora, $date, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma, $idUser, $urgente);
        $new->registerNew();
        $cateV = 0;
        $claveV = 0;

        ////////////////////// NEWS CATE ///////////////////////

        if ($_POST["uno"] !== "") {
            $cate = $_POST["uno"];
            $categ = "SELECT CATEGORY_ID, DESCRIPTION, COLOR FROM CATEGORIES";
            $category = $mysqli->query($categ); 
            while($row = mysqli_fetch_assoc($category)) {  
                if(strcmp($row['DESCRIPTION'], $cate)==0){
                    $color = $row['COLOR'];
                    $idCate = $row['CATEGORY_ID'];
                }

            }
            $cateV = 1;

            $new2 = new New2Contr($cate, $cateV, $claveV, $color, $idCate);
            $new2->registerNew2();
        }
        if ($_POST["dos"] !== "") {
            $cate = $_POST["dos"];
            $categ = "SELECT CATEGORY_ID, DESCRIPTION, COLOR FROM CATEGORIES";
            $category = $mysqli->query($categ); 
            while($row = mysqli_fetch_assoc($category)) {  
                if(strcmp($row['DESCRIPTION'], $cate)==0){
                    $color = $row['COLOR'];
                    $idCate = $row['CATEGORY_ID'];
                }
            }
            $cateV = 1;

            $new2 = new New2Contr($cate, $cateV, $claveV, $color, $idCate);
            $new2->registerNew2();
        }
        if ($_POST["tres"] !== "") {
            $cate = $_POST["tres"];
            $categ = "SELECT CATEGORY_ID, DESCRIPTION, COLOR FROM CATEGORIES";
            $category = $mysqli->query($categ); 
            while($row = mysqli_fetch_assoc($category)) {  
                if(strcmp($row['DESCRIPTION'], $cate)==0){
                    $color = $row['COLOR'];
                    $idCate = $row['CATEGORY_ID'];
                }
            }
            $cateV = 1;

            $new2 = new New2Contr($cate, $cateV, $claveV, $color, $idCate);
            $new2->registerNew2();
        }

        ////////////////////// NEWS CLAVES ///////////////////////
    
        if ($_POST["claveU"] !== "") {
            $clave = $_POST["claveU"];
            $cateV = 0;
            $claveV = 1;

            $new2 = new New2Contr($clave, $cateV, $claveV, "", "");
            $new2->registerNew2();
        }
        if ($_POST["claveD"] !== "") {
            $clave = $_POST["claveD"];
            $cateV = 0;
            $claveV = 1;

            $new2 = new New2Contr($clave, $cateV, $claveV, "", "");
            $new2->registerNew2();
        }
        if ($_POST["claveT"] !== "") {
            $clave = $_POST["claveT"];
            $cateV = 0;
            $claveV = 1;

            $new2 = new New2Contr($clave, $cateV, $claveV, "", "");
            $new2->registerNew2();
        }

        ////////////////////// NEWS IMAGES ///////////////////////

        if (!empty($_FILES["imagenT"]["tmp_name"])) {
            $fileName = basename($_FILES["imagenT"]["tmp_name"]);
            $imageTypeT = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $imageName = $_FILES["imagenT"]["tmp_name"];
            $image64 = base64_encode(file_get_contents($imageName));
            $realImage4 = 'data:image/'.$imageTypeT.';base64,'.$image64;
            $titulo = "1";

            ImageContr::withImage2($realImage4, $imageType3, $titulo)->uploadImage2();
        }
        if (!empty($_FILES["imagen"]["tmp_name"])) {
            $fileName = basename($_FILES["imagen"]["tmp_name"]);
            $imageTypeA = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $imageName = $_FILES["imagen"]["tmp_name"];
            $image64 = base64_encode(file_get_contents($imageName));
            $realImage = 'data:image/'.$imageTypeA.';base64,'.$image64;
            $titulo = "0";

            ImageContr::withImage2($realImage, $imageType, $titulo)->uploadImage2();
        }
        if (!empty($_FILES["imagen1"]["tmp_name"])) {
            $fileName = basename($_FILES["imagen1"]["tmp_name"]);
            $imageTypeB = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $imageName = $_FILES["imagen1"]["tmp_name"];
            $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
            $realImage1 = 'data:image/' . $imageTypeB . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
            $titulo = "0";

            ImageContr::withImage2($realImage1, $imageType1, $titulo)->uploadImage2();
        }
        if (!empty($_FILES["imagen2"]["tmp_name"])) {
            $fileName = basename($_FILES["imagen2"]["tmp_name"]);
            $imageTypeC = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $imageName = $_FILES["imagen2"]["tmp_name"];
            $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
            $realImage2 = 'data:image/' . $imageTypeC . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
            $titulo = 0;

            ImageContr::withImage2($realImage2, $imageType2, $titulo)->uploadImage2();
        }

        echo '<script type="text/javascript">';
        echo 'alert("Creacion de noticias exitosa u///u.");';
        echo 'window.location.href = "../editNoticia.php";';
        echo '</script>';

    } else {
        
        echo '<script type="text/javascript">';
        echo 'alert("Minimo un video.");';
        echo 'window.location.href = "../crearnoticia.php";';
        echo '</script>';
    }

}

?>