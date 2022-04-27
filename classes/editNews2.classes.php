<?php  
    include_once "../classes/dbh.classes.php";
    
    class editNews2 extends Dbh{

        protected function cate2($idNews, $PK, $uno, $color){
             
            $stmt = $this->connect()->prepare('CALL SP_NEWS_CATEGORIES(?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('update', $PK, $idNews, $uno, $color))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal categorias editar");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                } 
            $stmt = null;
        }

        protected function clave2($idNews, $PK, $uno){
             
            $stmt = $this->connect()->prepare('CALL SP_NEWS_CLAVE(?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('update', $PK, $idNews, $uno))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal claves editar");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                } 
            $stmt = null;
        }

        protected function cateIn2($idNews, $uno, $color){

             
            $stmt = $this->connect()->prepare('CALL SP_NEWS_CATEGORIES(?, ?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('editInsert', "", $idNews, $uno, $color))){

                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal categorias agregar");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                } 
            $stmt = null;
        }

        protected function claveIn2($idNews, $uno){
             
            $stmt = $this->connect()->prepare('CALL SP_NEWS_CLAVE(?, ?, ?, ?)'); 
            
                if(!$stmt->execute(array('editInsert', "", $idNews, $uno))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Mal claves agregar");';
                    echo 'window.location.href = "../editNoticia.php";';
                    echo '</script>';
                    exit();
                } 
            $stmt = null;
        }
       
    }
?>