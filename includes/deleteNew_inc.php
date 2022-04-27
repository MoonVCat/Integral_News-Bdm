<?php

    include "../contr/deleteNewcontr.classes.php";

    if(isset($_GET['id'])) {

            $id = $_GET['id'];
            $delete = new deleteNewContr($id);
            $delete->deleteNew();

        echo '<script type="text/javascript">'; 
        echo 'alert("Adios noticia nunca te quise.");';
        echo 'window.location.href = "../editNoticia.php";';
        echo '</script>';
    }



?>