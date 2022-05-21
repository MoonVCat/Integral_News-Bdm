<?php

    include "../classes/dbh.classes.php";

    class Register extends Dbh {

        protected function checkUser($email){ // --; DELETE FROM USERS (tumba todos los usuarios, es SQL INYECTION)
            $stmt = $this->connect()->prepare('SELECT EMAIL FROM USERS WHERE EMAIL = ?;'); //en la wildcard "= ?;" ahi se reemplaza info
            if(!$stmt->execute(array($email))){
                $stmt = null;
               
                echo '<script type="text/javascript">'; 
                echo 'alert("Error stmt fallo");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();
            }
            $check = '';
            if($stmt->rowCount() > 0){

                $check = false;
            }else{
                $check = true;
            }
            return $check;

        }

        protected function register($email, $pwd, $username, $telephone, $image, $reportero, $userType){
            //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
            //con un STORED PROCEDURE:
            $stmt = $this->connect()->prepare('CALL SP_USER(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
            
            $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
            if($reportero == 1){
                if(!$stmt->execute(array('insertar', "", $email, $hashPwd, "", $image, "2", "A", $telephone, $username, "", "", "2"))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Salio algo mal en la base de datos al crear nuevo reportero");';
                    echo 'window.location.href = "../registro.php";';
                    echo '</script>';
                    exit();
                }
                
            }else{
                if(!$stmt->execute(array('insertar', "", $email, $hashPwd, "", $image, $userType, "A", $telephone, $username, "", "", "1"))){
                    $stmt = null;
                
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Salio algo mal en la base de datos al registrar");';
                    echo 'window.location.href = "../registro.php";';
                    echo '</script>';
                    exit();
                }
                
            }
            
            $stmt = null;
            
        }
        
    }
?>