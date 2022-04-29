<?php  

    include "../classes/dbh.classes.php";

    class editNews extends Dbh{

        protected function editNew($idNews, $hora, $fecha, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma){

            $stmt = $this->connect()->prepare('CALL SP_NEWS( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('update', $idNews, $firma, $titulo, $descCorta, $desc, $ciudad, $colonia, $pais, "En redaccion", $fecha, $hora, "", "", "", ""))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Salio algo mal en la base de datos al actualizar Noticia");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                }
                
            $stmt = null;
            
        }
        
    }
?>