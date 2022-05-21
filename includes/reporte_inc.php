<?php

    if(isset($_POST["submit"])){

        $cateCB = $_POST["cateCB"];
        $startDate = $_POST["start"];
        $finalDate = $_POST["final"];

        echo '<script type="text/javascript">'; 
        echo 'alert("Reporte de noticias/secciones exitosa etto etto.");';
        echo 'window.location.href = "../reporteFinal.php?Fecha1='.$startDate.'&Fecha2='.$finalDate.'&Cate='.$cateCB.'";';
        echo '</script>';
    }

?>