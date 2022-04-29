<?php
include "../contr/commentariocontr.classes.php";

if (isset($_POST["submit"])) {
    $Comentario=$_POST["comentario"];
    $news=$_POST["idNews"];


    $ComentarioClass = new Comentariocontr($Comentario, $news, 0);
    $ComentarioClass->ComentarioUp();

    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../noticia.php?id='.$news.'";';
    echo '</script>';


}
?>