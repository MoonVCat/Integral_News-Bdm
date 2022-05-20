<?php

    include "../contr/editCateContr.classes.php";

    if(isset($_POST["submit"])){
        $title = '';
        $color= '';

        $id = $_GET['id'];
        $title= $_POST['name_cate'];
        $order= $_POST['num_cate'];
        $description = $_POST['description'];
        $color = $_POST['cbx_color'];
        

        $update = new editCateContr($id, $title, $description, $color, $order);
        $update->updateContr();

            echo '<script type="text/javascript">'; 
            echo 'alert("Edicion de seccion exitoso guapo/a.");';
            echo 'window.location.href = "../crearCate.php";';
            echo '</script>';
    }

?>