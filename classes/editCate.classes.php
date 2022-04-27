<?php


include "../classes/dbh.classes.php";

  class editCate extends Dbh{

    protected function checkUser($title, $description){ // --; DELETE FROM USERS (tumba todos los usuarios, es SQL INYECTION)

      $check = false;

      if(strcmp($title, $description) !== 0){

        $cate = $this->connect()->prepare('SELECT DESCRIPTION FROM CATEGORIES WHERE DESCRIPTION = ?;'); //en la wildcard "= ?;" ahi se reemplaza info
        if(!$cate->execute(array($title))){
            $corcatereo = null;
          
            echo '<script type="text/javascript">'; 
            echo 'alert("Error stmt fallo");';
            echo 'window.location.href = "../crearCate.php";';
            echo '</script>';

            exit();
        }
        if($cate->rowCount() > 0){

            $check = false;
        }else{
            $check = true;
        }
        return $check;

      }else {

        $check = true;
        return $check;
      }
      

    }

    function update($id, $title, $color){

            $stmt = $this->connect()->prepare('CALL SP_CATEGORIES( ?, ?, ?, ?)'); 

            if(!$stmt->execute(array('update', $id, $title, $color))){
              $stmt = null;
              echo '<script type="text/javascript">'; 
              echo 'alert("salio algo mal en la base de datos");';
              echo 'window.location.href = "../crearCate.php";';
              echo '</script>';
              exit();
            } 

      $stmt = null;
    }

}



?>