<?php
require 'C:\xampp\htdocs\proyecto\connection.php';
include "../contr/editNewContr.classes.php";
include "../contr/editNew2Contr.classes.php";
include "../contr/imagecontr.classes.php";

if (isset($_POST["submit"])) {

    $titulo = $_POST["titulo"];
    $idNews = $_POST["idNew"];
    $pais = $_POST["pais"];
    $ciudad = $_POST["ciudad"];
    $colonia = $_POST["colonia"];
    $descCorta = $_POST["descCorta"];
    $desc = $_POST["desc"];
    $firma = $_POST["firma"];
    $fecha = $_POST["date"];
    $comentarioEditor = $_POST["comentarioEditor"];
    $first = true;
    $second = true;
    $third = true;
    $fourth = true;
    $contador = 0;

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
        
        if(!empty($_FILES["imagenT"]["name"]) || !empty($_FILES["imagen"]["name"]) || !empty($_FILES["imagen1"]["name"]) || !empty($_FILES["imagen2"]["name"])){

            if(strcmp($imageType, $mp4) == 0 || strcmp($imageType1, $mp4) == 0 || strcmp($imageType2, $mp4) == 0){

                $new = new editNewContr($idNews, $hora, $date, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma, $comentarioEditor);
                $new->editNew2();
                $cateV = 0;
                $claveV = 0;
        
                ////////////////////// NEWS CATE ///////////////////////
        
                if ($_POST["uno"] !== "") {
                    $cate = $_POST["uno"];
                    
                    $categ = "SELECT DESCRIPTION, COLOR FROM CATEGORIES";
                    $category = $mysqli->query($categ); 
                    while($row = mysqli_fetch_assoc($category)) {  
                        if(strcmp($row['DESCRIPTION'], $cate)==0){
                            $color = $row['COLOR'];
                        }
                    }
                    $cateV = 1;
                    
                    if($_POST["unoPK"] !== ""){
                        $catePK = $_POST["unoPK"];
                        $new2 = new editNew2Contr($idNews, $catePK, $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $cate, $cateV, $claveV, $color);
                    $new2->editNew2();
                    }
                }
                if ($_POST["dos"] !== "") {
                    $cate = $_POST["dos"];
                    $categ = "SELECT DESCRIPTION, COLOR FROM CATEGORIES";
                    $category = $mysqli->query($categ); 
                    while($row = mysqli_fetch_assoc($category)) {  
                        if(strcmp($row['DESCRIPTION'], $cate)==0){
                            $color = $row['COLOR'];
                        }
                    }
                    $cateV = 1;

                    if($_POST["dosPK"] !== ""){
                        $catePK = $_POST["dosPK"];
                        $new2 = new editNew2Contr($idNews, $catePK, $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }
        
                }
                if ($_POST["tres"] !== "") {
                    $cate = $_POST["tres"];
                    $categ = "SELECT DESCRIPTION, COLOR FROM CATEGORIES";
                    $category = $mysqli->query($categ); 
                    while($row = mysqli_fetch_assoc($category)) {  
                        if(strcmp($row['DESCRIPTION'], $cate)==0){
                            $color = $row['COLOR'];
                        }
                    }
                    $cateV = 1;
        
                    if($_POST["tresPK"] !== ""){
                        $catePK = $_POST["tresPK"];
                        $new2 = new editNew2Contr($idNews, $catePK, $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }
                }
        
                ////////////////////// NEWS CLAVES ///////////////////////
            
                if ($_POST["claveU"] !== "") {
                    $clave = $_POST["claveU"];
                    $cateV = 0;
                    $claveV = 1;

                    if($_POST["claveUPK"] !== ""){
                        $clavePK = $_POST["claveUPK"];
                        $new2 = new editNew2Contr($idNews, $clavePK, $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }
        
                }
                if ($_POST["claveD"] !== "") {
                    $clave = $_POST["claveD"];
                    $cateV = 0;
                    $claveV = 1;
        
                    if($_POST["claveDPK"] !== ""){
                        $clavePK = $_POST["claveDPK"];
                        $new2 = new editNew2Contr($idNews, $clavePK, $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }
                }
                if ($_POST["claveT"] !== "") {
                    $clave = $_POST["claveT"];
                    $cateV = 0;
                    $claveV = 1;
        
                    if($_POST["claveTPK"] !== ""){
                        $clavePK = $_POST["claveTPK"];
                        $new2 = new editNew2Contr($idNews, $clavePK, $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }
                }
   
                ////////////////////// NEWS IMAGES ///////////////////////

                if (!empty($_FILES["imagenT"]["tmp_name"])) {
                    $fileName = basename($_FILES["imagenT"]["tmp_name"]);
                    $imageTypeT = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
                    $imageName = $_FILES["imagenT"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage4 = 'data:image/'.$imageTypeT.';base64,'.$image64;
                    $titulo = "1";
        
                    ImageContr::withImageEdit($idNews, "", $realImage4, $imageType3, $titulo)->uploadTitleEdit();
                }

                    $newImage = "SELECT N_IMAGE_ID, NEWS_ID FROM NEWS_IMAGE WHERE NEWS_ID = $idNews";
                    $resImage = $mysqli->query($newImage);
                    while ($row3 = $resImage->fetch_assoc()) {

                        if(true === $first){
                            $first = false;
                            continue;
                        }

                        if(true === $second){

                            if (!empty($_FILES["imagen"]["tmp_name"])) {
                                $fileName = basename($_FILES["imagen"]["tmp_name"]);
                                $imageTypeA = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                $imageName = $_FILES["imagen"]["tmp_name"];
                                $image64 = base64_encode(file_get_contents($imageName));
                                $realImage = 'data:image/'.$imageTypeA.';base64,'.$image64;
                                $titulo = "0";

                                $idImg = $row3['N_IMAGE_ID'];
                                ImageContr::withImageEdit($idNews, $idImg, $realImage, $imageType, $titulo)->uploadImageEdit();
                            }
                            $second = false;
                            $contador = 1;
                            continue;
                        }
                        if(true === $third){
                            if (!empty($_FILES["imagen1"]["tmp_name"])) {
                                $fileName = basename($_FILES["imagen1"]["tmp_name"]);
                                $imageTypeB = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                $imageName = $_FILES["imagen1"]["tmp_name"];
                                $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                                $realImage1 = 'data:image/' . $imageTypeB . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
                                $titulo = "0";
                
                                $idImg = $row3['N_IMAGE_ID'];
                                ImageContr::withImageEdit($idNews, $idImg, $realImage1, $imageType1, $titulo)->uploadImageEdit();
                            }
                            $third = false;
                            $contador = 2;
                            continue;
                        }
                        if(true === $fourth){
                            if (!empty($_FILES["imagen2"]["tmp_name"])) {
                                $fileName = basename($_FILES["imagen2"]["tmp_name"]);
                                $imageTypeC = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                $imageName = $_FILES["imagen2"]["tmp_name"];
                                $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                                $realImage2 = 'data:image/' . $imageTypeC . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
                                $titulo = 0;

                                $idImg = $row3['N_IMAGE_ID'];
                                ImageContr::withImageEdit($idNews, $idImg, $realImage2, $imageType2, $titulo)->uploadImageEdit();
                            }
                            $fourth = false;
                            $contador = 3;
                            continue;
                        }
                    }

                    if($contador == 1){

                        if (!empty($_FILES["imagen1"]["tmp_name"])) {
                            $fileName = basename($_FILES["imagen1"]["tmp_name"]);
                            $imageTypeB = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                            $imageName = $_FILES["imagen1"]["tmp_name"];
                            $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                            $realImage1 = 'data:image/' . $imageTypeB . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
                            $titulo = "0";
                
                            ImageContr::withImageEdit($idNews, "", $realImage1, $imageType1, $titulo)->uploadImageEdit();                             
                        }
                        if (!empty($_FILES["imagen2"]["tmp_name"])) {
                            $fileName = basename($_FILES["imagen2"]["tmp_name"]);
                            $imageTypeC = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                            $imageName = $_FILES["imagen2"]["tmp_name"];
                            $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                            $realImage2 = 'data:image/' . $imageTypeC . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
                            $titulo = 0;
                
                            ImageContr::withImageEdit($idNews, "", $realImage2, $imageType2, $titulo)->uploadImageEdit();
                        }
                    }

                    if($contador == 2){

                        if (!empty($_FILES["imagen2"]["tmp_name"])) {
                            $fileName = basename($_FILES["imagen2"]["tmp_name"]);
                            $imageTypeC = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                            $imageName = $_FILES["imagen2"]["tmp_name"];
                            $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                            $realImage2 = 'data:image/' . $imageTypeC . ';base64,' . $base64Image; //para concatenar en php se usa el punto "."
                            $titulo = 0;
                
                            ImageContr::withImageEdit($idNews, "", $realImage2, $imageType2, $titulo)->uploadImageEdit();
                        }
                    }
        
                echo '<script type="text/javascript">';
                echo 'alert("Edicion de noticia exitosa u///u.");';
                echo 'window.location.href = "../editNoticia.php";';
                echo '</script>';
        
            } else {

                echo '<script type="text/javascript">';
                echo 'alert("Minimo un video.");';
                echo 'window.location.href = "../editNoticia.php";';
                echo '</script>';
            }
        } else {

            $new = new editNewContr($idNews, $hora, $date, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma, $comentarioEditor);
                $new->editNew2();
                $cateV = 0;
                $claveV = 0;
        
                ////////////////////// NEWS CATE ///////////////////////
        
                if ($_POST["uno"] !== "") {
                    $cate = $_POST["uno"];
                    
                    $categ = "SELECT DESCRIPTION, COLOR FROM CATEGORIES";
                    $category = $mysqli->query($categ); 
                    while($row = mysqli_fetch_assoc($category)) {  
                        if(strcmp($row['DESCRIPTION'], $cate)==0){
                            $color = $row['COLOR'];
                        }
                    }
                    $cateV = 1;
                    
                    if($_POST["unoPK"] !== ""){
                        $catePK = $_POST["unoPK"];
                        $new2 = new editNew2Contr($idNews, $catePK, $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }
                }
                if ($_POST["dos"] !== "") {
                    $cate = $_POST["dos"];
                    $categ = "SELECT DESCRIPTION, COLOR FROM CATEGORIES";
                    $category = $mysqli->query($categ); 
                    while($row = mysqli_fetch_assoc($category)) {  
                        if(strcmp($row['DESCRIPTION'], $cate)==0){
                            $color = $row['COLOR'];
                        }
                    }
                    $cateV = 1;

                    if($_POST["dosPK"] !== ""){
                        $catePK = $_POST["dosPK"];
                        $new2 = new editNew2Contr($idNews, $catePK, $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }
        
                }
                if ($_POST["tres"] !== "") {
                    $cate = $_POST["tres"];
                    $categ = "SELECT DESCRIPTION, COLOR FROM CATEGORIES";
                    $category = $mysqli->query($categ); 
                    while($row = mysqli_fetch_assoc($category)) {  
                        if(strcmp($row['DESCRIPTION'], $cate)==0){
                            $color = $row['COLOR'];
                        }
                    }
                    $cateV = 1;
        
                    if($_POST["tresPK"] !== ""){
                        
                        $catePK = $_POST["tresPK"];
                        
                        $new2 = new editNew2Contr($idNews, $catePK, $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $cate, $cateV, $claveV, $color);
                        $new2->editNew2();
                    }
                }
        
                ////////////////////// NEWS CLAVES ///////////////////////
            
                if ($_POST["claveU"] !== "") {
                    $clave = $_POST["claveU"];
                    $cateV = 0;
                    $claveV = 1;

                    if($_POST["claveUPK"] !== ""){
                        $clavePK = $_POST["claveUPK"];
                        $new2 = new editNew2Contr($idNews, $clavePK, $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }
        
                }
                if ($_POST["claveD"] !== "") {
                    $clave = $_POST["claveD"];
                    $cateV = 0;
                    $claveV = 1;
        
                    if($_POST["claveDPK"] !== ""){
                        $clavePK = $_POST["claveDPK"];
                        $new2 = new editNew2Contr($idNews, $clavePK, $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }
                }
                if ($_POST["claveT"] !== "") {
                    $clave = $_POST["claveT"];
                    $cateV = 0;
                    $claveV = 1;
        
                    if($_POST["claveTPK"] !== ""){
                        $clavePK = $_POST["claveTPK"];
                        $new2 = new editNew2Contr($idNews, $clavePK, $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }else{
                        $new2 = new editNew2Contr($idNews, "", $clave, $cateV, $claveV, "");
                        $new2->editNew2();
                    }
                }

                echo '<script type="text/javascript">';
                echo 'alert("Edicion de noticia exitosa u///u.");';
                echo 'window.location.href = "../editNoticia.php";';
                echo '</script>';
        }

}

?>