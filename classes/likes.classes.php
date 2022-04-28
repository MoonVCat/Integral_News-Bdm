<?php

include_once("../classes/dbh.classes.php");
session_start();

class LikeNews extends Dbh{

    function BuscarLike($NewsID){

        $user= $_SESSION["USER_ID"];
        $stmt = $this->connect()->prepare('SELECT NEWS_FK, `LIKE`, USER_FK FROM NEWS_LIKES WHERE NEWS_FK = ? AND USER_FK = ?;');
        
        if(!$stmt->execute(array($NewsID,$user))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("salio algo mal seleccionar likes");';
            echo 'window.location.href = "../noticia.php?id='.$NewsID.'";';
            echo '</script>';
            exit();
        }

        if($stmt->rowCount() !== 0){ //el rowcount == 0 significa que no hay ningun usuario o que no lo encontro
            $stmt = null;
            $stmt = $this->connect()->prepare('CALL SP_NEWS_LIKES(?, ?, ?)'); 
          
            if(!$stmt->execute(array('NoGusta', $NewsID, $user))){                        
                $stmt = null;
                echo '<script type="text/javascript">'; 
                echo 'alert("Salio algo mal no gustar noticia");';
                echo 'window.location.href = "../noticia.php?id='.$NewsID.'";';
                echo '</script>';
                exit();
            }
            echo '<script type="text/javascript">'; 
            echo 'window.location.href = "../noticia.php?id='.$NewsID.'";';
            echo '</script>';
            $stmt = null;

            exit();
        }else{
            $stmt = $this->connect()->prepare('CALL SP_NEWS_LIKES(?, ?, ?)'); 
      
            if(!$stmt->execute(array('Gusta', $NewsID, $user))){                        
                $stmt = null;
                echo '<script type="text/javascript">'; 
                echo 'alert("Salio algo mal gustar noticia");';
                echo 'window.location.href = "../noticia.php?id='.$NewsID.'";';
                echo '</script>';
                exit();
            }
                echo '<script type="text/javascript">'; 
                echo 'window.location.href = "../noticia.php?id='.$NewsID.'";';
                echo '</script>';
            
            $stmt = null;
 
        }
    }
}
?>