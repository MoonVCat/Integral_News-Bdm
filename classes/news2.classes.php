<?php  
    include_once "../classes/dbh.classes.php";
    
    class News2 extends Dbh{

        protected function cate2($uno, $color, $idCate){
             
            $stmt = $this->connect()->prepare('CALL SP_NEWS_CATEGORIES(?, ?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('insertar', "", "", $uno, $color, $idCate))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal categorias");';
                    echo 'window.location.href = "../crearNoticia.php";';
                    echo '</script>';
                    exit();
                } 
            $stmt = null;
        }

        protected function clave2($uno){
             
            $stmt = $this->connect()->prepare('CALL SP_NEWS_CLAVE(?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('insertar', "", "", $uno))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal claves");';
                    echo 'window.location.href = "../crearNoticia.php";';
                    echo '</script>';
                    exit();
                } 
            $stmt = null;
        }

       
    }
?>