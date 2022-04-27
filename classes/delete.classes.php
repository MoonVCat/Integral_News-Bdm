<?php
    
    include "../classes/dbh.classes.php";

        class Delete extends Dbh{
                function delete($id, $norepo){

                        $stmt = $this->connect()->prepare('CALL SP_USER(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
                
                        if(!$stmt->execute(array('delete', $id, "","","","","", "","","","","", ""))){
                                $stmt = null;
                                echo '<script type="text/javascript">'; 
                                echo 'alert("salio algo mal en la base de datos");';
                                echo 'window.location.href = "C:\xampp\htdocs\proyecto\conf.php";';
                                echo '</script>';
                                exit();
                        } else {

                                if($norepo == 0){
                                        session_start();
                                        unset($_SESSION["USER_ID"]);
                                        unset($_SESSION["user_login"]);
                                        unset($_SESSION["username"]);
                                        unset($_SESSION["image"]);
                                        unset($_SESSION["phone"]);
                                        unset($_SESSION["infoU"]);
                                        unset($_SESSION["nombreCom"]);
                                        unset($_SESSION["valPass"]);
                                } 
                                
                        }
                
                        $stmt = null;
                }
        }

?>

