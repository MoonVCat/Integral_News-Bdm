<?php
    
    include_once("../classes/dbh.classes.php");

        class deleteNew extends Dbh{
                function delete($id){

                        $image = $this->connect()->prepare('CALL SP_NEWS_IMAGE(?, ?, ?, ?, ?, ?)'); 
     
                        if(!$image->execute(array('delete', "", $id, "", "", ""))){
                                $image = null;
                                echo '<script type="text/javascript">'; 
                                echo 'alert("Mal imagen");';
                                echo 'window.location.href = "C:\xampp\htdocs\proyecto\editNoticia.php";';
                                echo '</script>';
                                exit();
                        } 
                        $cate = $this->connect()->prepare('CALL SP_NEWS_CATEGORIES(?, ?, ?, ?, ?, ?)'); 
  
                        if(!$cate->execute(array('delete', "", $id, "", "", ""))){
                                $cate = null;
                                echo '<script type="text/javascript">'; 
                                echo 'alert("Mal categorias");';
                                echo 'window.location.href = "C:\xampp\htdocs\proyecto\editNoticia.php";';
                                echo '</script>';
                                exit();
                        }
                        
                        $clave = $this->connect()->prepare('CALL SP_NEWS_CLAVE(?, ?, ?, ?)'); 
                 
                        if(!$clave->execute(array('delete', "", $id, ""))){
                                $clave = null;
                                
                                echo '<script type="text/javascript">'; 
                                echo 'alert("Mal claves");';
                                echo 'window.location.href = "../editNoticia.php";';
                                echo '</script>';
                                exit();
                        } 
                        $stmt = $this->connect()->prepare('CALL SP_NEWS( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
                    
                        if(!$stmt->execute(array('delete', $id, "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""))){
                                $stmt = null;
                                echo '<script type="text/javascript">'; 
                                echo 'alert("salio algo mal en la base de datos");';
                                echo 'window.location.href = "C:\xampp\htdocs\proyecto\crearCate.php";';
                                echo '</script>';
                                exit();
                        } 
                        
                        $stmt = null;
                        $image = null;
                        $cate = null;
                        $clave = null;
                }
        }

?>
