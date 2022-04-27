<?php

    
include "../contr/catecontr.classes.php";

    if(isset($_POST["submit"])){

        $id_color = $_POST["cbx_color"];
        $id_nombre = $_POST["name_cate"];

        $cate = new CateContr($id_color, $id_nombre);
        $cate->registerCate();

        
        echo '<script type="text/javascript">'; 
        echo 'alert("Creacion de seccion exitoso guapo/a.");';
        echo 'window.location.href = "../crearCate.php";';
        echo '</script>';
    }
   

?>

