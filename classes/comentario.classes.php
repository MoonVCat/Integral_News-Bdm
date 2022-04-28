<?php

include("../classes/dbh.classes.php");
session_start();
class Comentario extends Dbh
{
   
    function subirComentario($News, $content , $idComentario)
    {
        $Reportero= $_SESSION["USER_ID"];

        $stmt = $this->connect()->prepare('CALL SP_NEWS_COMMENTS(?, ?, ?, ?,?)');
        if (!$stmt->execute(array('Insertar', $Reportero, $News, $content, $idComentario))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal agregar comentario");';
            echo 'window.location.href = "../index.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function UpdateComentario($id_Comentario, $Contenido)
    {
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('UPDATE COMMENT SET CONTENT = ? WHERE ID_COMMENT=?; ');
        if (!$stmt->execute(array($Contenido, $id_Comentario))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal actualizar");';
            echo 'window.location.href = "../index.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function eliminar($id_Eliminar)
    {
        
        $stmt = $this->connect()->prepare('DELETE FROM COMMENT WHERE FK_COMMENT = ? OR ID_COMMENT = ?;');
        if (!$stmt->execute(array($id_Eliminar, $id_Eliminar))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal eliminar comentario");';
            echo 'window.location.href = "../index.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function eliminarRespuesta($id_Eliminar)
    {
    
        $stmt = $this->connect()->prepare('DELETE FROM COMMENT WHERE ID_COMMENT=?;');
        if (!$stmt->execute(array($id_Eliminar))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal eliminar respuesta");';
            echo 'window.location.href = "../index.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

}
?>