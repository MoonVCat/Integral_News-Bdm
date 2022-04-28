<?php
    include ('../classes/comentario.classes.php');
  
        $idComentario=$_GET["idComentario"];
        $idNews=$_GET["idNoticia"];
        
        $eliminar= new Comentario();
        $eliminar->eliminar($idComentario);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../noticia.php?id='.$idNews.'";';
        echo '</script>';

?>