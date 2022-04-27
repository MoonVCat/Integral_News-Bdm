<?php

include "../classes/dbh.classes.php";

class Login extends Dbh{

    function sign_in($email, $password){

        $stmt = $this->connect()->prepare('SELECT * FROM USERS WHERE EMAIL =  ?;');
        if(!$stmt->execute(array($email))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("salio algo mal en la base de datos");';
            echo 'window.location.href = "../login.php";';
            echo '</script>';
            exit();
        }

        $check = '';
        if($stmt->rowCount() == 0){ //el rowcount == 0 significa que no hay ningun usuario o que no lo encontro
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Usuario no encontrado");';
            echo 'window.location.href = "../login.php";';
            echo '</script>';
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); //nos regresara todas las filas que encontro en el query, pero tenemos que darle una manera de como nos lo regresara
   
        $checkPwd = password_verify($password, $pwdHashed[0]["PASS"]); //password_verify me permite comparar el password que esta mandando un usuario con el que esta hasheado en la base de datos
    
        if($checkPwd == false){

            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Contraseña incorrecta");';
            echo 'window.location.href = "../login.php";';
            echo '</script>';
            exit();

        } else if($checkPwd == true){

                session_start(); //nos permite guardar cookies en una misma navegacion

                $_SESSION["user_login"] = $pwdHashed[0]["EMAIL"];
                $_SESSION["USER_ID"] = $pwdHashed[0]["USER_ID"];
                $_SESSION["username"] = $pwdHashed[0]["USERNAME"];
                $_SESSION["image"] = $pwdHashed[0]["PROFILE_PIC"];
                $_SESSION["phone"] = $pwdHashed[0]["PHONE"];
                $_SESSION["infoU"] = $pwdHashed[0]["USER_INFO"];
                $_SESSION["nombreCom"] = $pwdHashed[0]["FULL_NAME"];
                $_SESSION["user_type"] = $pwdHashed[0]["USER_TYPE_ID"];
                $_SESSION["valPass"] = $pwdHashed[0]["VAL_PASS"];

                //return $stmt;
        }
        $stmt = null; //mata toda conexion, no hay que dejar conexiones abiertas en php xq luego satura la memoria
    }
}

?>