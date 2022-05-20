<?php  
    session_start();
    include "../classes/dbh.classes.php";

    class doneNew extends Dbh{

        protected function done($id){

            $stmt = $this->connect()->prepare('CALL SP_NEWS( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('terminada', $id, "", "", "", "", "", "", "", "Terminada", "", "", "", "", "", "", ""))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal terminar");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                }
            $stmt = null;
        }

        protected function aprobar($id){

            $stmt = $this->connect()->prepare('CALL SP_NEWS( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('publicada', $id, "", "", "", "", "", "", "", "Publicada", "", "", "", "", "", "", ""))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal terminar");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                }
            $stmt = null;
        }

        protected function comen($id, $comen){

            $stmt = $this->connect()->prepare('CALL SP_NEWS( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('revision', $id, "", "", "", "", "", "", "", "En redaccion", "", "", "", "", $comen, "", ""))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal terminar");';
                    echo 'window.location.href = "../aprobarNew.php";';
                    echo '</script>';
                    exit();
                }
            $stmt = null;
        }
        
    }
?>