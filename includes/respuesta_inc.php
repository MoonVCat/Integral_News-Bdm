<?php
include "../contr/commentariocontr.classes.php";

if (isset($_POST["submit"])) {
    $idComentario=$_POST["idCom"];
    $idnews=$_POST["idNews"];
    $Comentario=$_POST["Comentario"];
    

    $ComentarioClass = new Comentariocontr($Comentario,$idnews,$idComentario);
    $ComentarioClass->ComentarioUp();

    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../noticia.php?id='.$idnews.'";';
    echo '</script>';


}
?>