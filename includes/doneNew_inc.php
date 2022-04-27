<?php

    include '../contr/doneNewContr.classes.php';

    
    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $a = "";
        $done = new doneNewContr($id, $a);
        $done->doneNew();

        echo '<script type="text/javascript">'; 
        echo 'alert("Mandada para su aprobacion.");';
        echo 'window.location.href = "../editNoticia.php";';
        echo '</script>';
    }

    if(isset($_GET['idAprobar'])) {

        $id = $_GET['idAprobar'];
        $a = "";
        $done = new doneNewContr($id, $a);
        $done->doneAprobarNew();

        echo '<script type="text/javascript">'; 
        echo 'alert("Mandada para su aprobacion.");';
        echo 'window.location.href = "../aprobarNew.php";';
        echo '</script>';
    }

    if(isset($_POST["submit"])){
        $id = $_POST['idNew'];
        $comen = $_POST["comen"];

        $done = new doneNewContr($id, $comen);
        $done->doneRepoNew();

        echo '<script type="text/javascript">'; 
        echo 'alert("Mandada para su edicion.");';
        echo 'window.location.href = "../aprobarNew.php";';
        
        echo '</script>';
    }

?>