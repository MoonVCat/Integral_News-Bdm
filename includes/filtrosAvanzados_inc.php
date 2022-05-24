<?php

if (isset($_POST["submit"])) {

    $clave1 = $_POST["cbx_clave1"];
    $clave2 = $_POST["cbx_clave2"];
    $clave3 = $_POST["cbx_clave3"];

    $cate1 = $_POST["cbx_cate1"];
    $cate2 = $_POST["cbx_cate2"];
    $cate3 = $_POST["cbx_cate3"];

    $urgente = $_POST["urgente"];

    $start = $_POST["start"];
    $final = $_POST["final"];

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../index_Avanzados.php?Fecha1='.$start.'&Fecha2='.$final.'&clave1='.$clave1.'&clave2='.$clave2.'&clave3='.$clave3.'&cate1='.$cate1.'&cate2='.$cate2.'&cate3='.$cate3.'&urgente='.$urgente.'";';
    echo '</script>';

}
?>