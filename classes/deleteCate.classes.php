<?php
    
    include "../classes/dbh.classes.php";

        class DeleteCate extends Dbh{
                function delete($id){

                        $stmt = $this->connect()->prepare('CALL SP_CATEGORIES( ?, ?, ?, ?)'); 
            
                        if(!$stmt->execute(array('delete', $id, "", ""))){
                          $stmt = null;
                          echo '<script type="text/javascript">'; 
                          echo 'alert("salio algo mal en la base de datos");';
                          echo 'window.location.href = "C:\xampp\htdocs\proyecto\crearCate.php";';
                          echo '</script>';
                          exit();
                        } 
            
                  $stmt = null;
                }
        }

?>
