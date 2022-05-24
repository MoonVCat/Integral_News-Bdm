<?php

if (isset($_POST["submit"])) {

    $clave1 = $_POST["cbx_clave1"];
    $clave2 = $_POST["cbx_clave2"];
    $clave3 = $_POST["cbx_clave3"];

    $urgente = $_POST["urgente"];
    $texto = $_POST["texto"];

    $start = $_POST["start"];
    $final = $_POST["final"];

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../index_Avanzados.php?Fecha1='.$start.'&Fecha2='.$final.'&clave1='.$clave1.'&clave2='.$clave2.'&clave3='.$clave3.'&urgente='.$urgente.'&texto='.$texto.'";';
    echo '</script>';

}
?>