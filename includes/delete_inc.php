<?php

    include '../contr/deletecontr.classes.php';

    if(isset($_GET['id'])){
        $norepo = 1;
        $id = $_GET['id'];

        $delete = new deletecontr( $id, $norepo);
        $delete->deleteUser();

            echo '<script type="text/javascript">'; 
            echo 'alert("Adios reportero te ira mejor en el anexo");';
            echo 'window.location.href = "../editarUser.php";';
            echo '</script>';
    }

    if(isset($_GET['deleteid'])){
        $norepo = 0;
        $id = $_GET['deleteid'];

        $delete = new deletecontr( $id, $norepo);
        $delete->deleteUser();

            echo '<script type="text/javascript">'; 
            echo 'alert("Adios usuario te ira mejor en el anexo");';
            echo 'window.location.href = "../index.php";';
            echo '</script>';
    }
?>

