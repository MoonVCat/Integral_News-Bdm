<?php
include_once("../classes/dbh.classes.php");

class Imagen extends Dbh{

    protected function upload($image,$id){

        $stmt = $this->connect()->prepare('CALL SP_USER(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        if(!$stmt->execute(array('image', $id, "", "", "", $image, "", "", "", "", "", "", ""))){
            $stmt = null;
              echo '<script type="text/javascript">'; 
              echo 'alert("salio algo mal en la base de datos");';
              echo 'window.location.href = "../conf.php";';
              echo '</script>';
            exit();
        }
        else{
            session_start();

            $_SESSION["image"] =  $image;
        }
        $stmt = null;
    }

     function upload2($uno, $tipo, $titulo){

        $stmt = $this->connect()->prepare('CALL SP_NEWS_IMAGE(?, ?, ?, ?, ?, ?)'); 
        if($titulo == 1) {
            if(!$stmt->execute(array('titulo', "", "", $uno, "", $tipo))){
                $stmt = null;
            
                echo '<script type="text/javascript">'; 
                echo 'alert("Mal titulo");';
                echo 'window.location.href = "../crearNoticia.php";';
                echo '</script>';
                exit();
            } 
        } else {
            if(!$stmt->execute(array('insertar', "", "", "", $uno, $tipo))){
                $stmt = null;
            
                echo '<script type="text/javascript">'; 
                echo 'alert("Mal imagen");';
                echo 'window.location.href = "../crearNoticia.php";';
                echo '</script>';
                exit();
            } 
        }
        
        $stmt = null;
    }

    function insertEdit($idNew, $uno, $tipo){

        $stmt = $this->connect()->prepare('CALL SP_NEWS_IMAGE(?, ?, ?, ?, ?, ?)'); 
        
        if(!$stmt->execute(array('insertImg', "", $idNew, "", $uno, $tipo))){
            $stmt = null;
        
            echo '<script type="text/javascript">'; 
            echo 'alert("Mal imagen insertada");';
            echo 'window.location.href = "../editNoticia.php";';
            echo '</script>';
            exit();
        } 
        
        $stmt = null;
    }

    function uploadEdit($idNew, $imgId, $uno, $tipo, $titulo){

        $stmt = $this->connect()->prepare('CALL SP_NEWS_IMAGE(?, ?, ?, ?, ?, ?)'); 
        if($titulo == 1) {
            if(!$stmt->execute(array('updateTitle', "", $idNew, $uno, "", $tipo))){
                $stmt = null;
            
                echo '<script type="text/javascript">'; 
                echo 'alert("Mal titulo editada");';
                echo 'window.location.href = "../editNoticia.php";';
                echo '</script>';
                exit();
            } 
        } else {
            echo "<script> alert('".$imgId."'); </script>"; 
            echo "<script> alert('".$idNew."'); </script>"; 
            echo "<script> alert('".$uno."'); </script>";
            echo "<script> alert('".$tipo."'); </script>";
            if(!$stmt->execute(array('update', $imgId, $idNew, "", $uno, $tipo))){
                $stmt = null;
            
                echo '<script type="text/javascript">'; 
                echo 'alert("Mal imagen editada");';
                echo 'window.location.href = "../editNoticia.php";';
                echo '</script>';
                exit();
            } 
        }
        
        $stmt = null;
    }

}
?>