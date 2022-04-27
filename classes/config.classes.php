<?php

session_start();

include "../classes/dbh.classes.php";

  class Config extends Dbh{

    protected function checkUser($email){ // --; DELETE FROM USERS (tumba todos los usuarios, es SQL INYECTION)

      $check = false;
      
      if(strcmp($email, $_SESSION["user_login"]) !== 0){

        $correo = $this->connect()->prepare('SELECT EMAIL FROM USERS WHERE EMAIL = ?;'); //en la wildcard "= ?;" ahi se reemplaza info
        if(!$correo->execute(array($email))){
            $correo = null;
          
            echo '<script type="text/javascript">'; 
            echo 'alert("Error stmt fallo");';
            echo 'window.location.href = "../config.php";';
            echo '</script>';

            exit();
        }
        if($correo->rowCount() > 0){

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

    function config($username, $nameCom, $telephone, $email, $pwd, $info){

            $stmt = $this->connect()->prepare('CALL SP_USER(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 

            $id= $_SESSION['USER_ID'];
            $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

            if(!$stmt->execute(array('update', $id, $email, $hashPwd, $nameCom, "", "", "", $telephone, $username, "", $info, "1"))){
              $stmt = null;
              echo '<script type="text/javascript">'; 
              echo 'alert("salio algo mal en la base de datos");';
              echo 'window.location.href = "../conf.php";';
              echo '</script>';
              exit();
            } else {

              $_SESSION["user_login"] =  $email;
              $_SESSION["username"] = $username;
              $_SESSION["phone"] = $telephone;
              $_SESSION["infoU"] = $info;
              $_SESSION["nombreCom"] = $nameCom;
              $_SESSION["valPass"] = "1";

              //return $stmt;
            }

      $stmt = null;
    }

}



?>