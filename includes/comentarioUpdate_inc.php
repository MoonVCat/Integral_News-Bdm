<?php
    include ('../classes/comentario.classes.php');
    if(isset($_POST["submit"])){
        
        $idComentario=$_POST["idComen"];
        $ContenidoEditado=$_POST["EdicionNuevo"];
        $news=$_POST["idNews"];
        
        $UpdateComentario = new Comentario();
        $UpdateComentario->UpdateComentario($idComentario, $ContenidoEditado);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../noticia.php?id='.$news.'";';
        echo '</script>';
    
    }

?>