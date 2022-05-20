<?php  
    session_start();
    include "../classes/dbh.classes.php";

    class News extends Dbh{

        protected function new($hora, $fecha, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma, $idUser, $urgente){

            $stmt = $this->connect()->prepare('CALL SP_NEWS( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('insertar', "", $firma, $titulo, $descCorta, $desc, $ciudad, $colonia, $pais, "En redaccion", $fecha, $hora, "", $idUser, "", "", $urgente))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Salio algo mal en la base de datos al crear Noticia");';
                    echo 'window.location.href = "../crearNoticia.php";';
                    echo '</script>';
                    exit();
                }
                
            $stmt = null;
            
        }
        
    }
?>