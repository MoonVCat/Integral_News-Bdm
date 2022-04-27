<?php

    include '../contr/deleteCatecontr.classes.php';

    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        
        $delete = new deleteCateContr($id);
        $delete->deleteCate();

        echo '<script type="text/javascript">'; 
        echo 'alert("Adios seccion nunca te quise.");';
        echo 'window.location.href = "../crearCate.php";';
        echo '</script>';
    }



?>