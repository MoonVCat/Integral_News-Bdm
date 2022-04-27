<?php

    include "../classes/dbh.classes.php";

    class Category extends Dbh{ 

        protected function checkCate($id_nombre){ 
            $stmt = $this->connect()->prepare('SELECT DESCRIPTION FROM CATEGORIES WHERE DESCRIPTION = ?;'); //en la wildcard "= ?;" ahi se reemplaza info
            if(!$stmt->execute(array($id_nombre))){
                $stmt = null;
               
                echo '<script type="text/javascript">'; 
                echo 'alert("Error stmt fallo");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();
            }
            $check = "";
            if($stmt->rowCount() > 0){

                $check = false;
            }else{
                $check = true;
            }
            return $check;

        }

        protected function categoryR($id_color, $id_nombre){

            $stmt = $this->connect()->prepare('CALL SP_CATEGORIES( ?, ?, ?, ?)'); 
            
            if(!$stmt->execute(array('insertar', "", $id_nombre, $id_color))){

                
                $stmt = null;
            
                echo '<script type="text/javascript">'; 
                echo 'alert("Salio algo mal en la base de datos al registrar");';
                echo 'window.location.href = "../crearCate.php";';
                echo '</script>';
                exit();
            }
            
            $stmt = null;
            
        }

    }

?>