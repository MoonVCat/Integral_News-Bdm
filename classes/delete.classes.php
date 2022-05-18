<?php
    
    include "../classes/dbh.classes.php";
        class Delete extends Dbh{
                function delete($id, $norepo){

                        $stmt = $this->connect()->prepare('CALL SP_USER(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'); 
                
                        if(!$stmt->execute(array('delete', $id, "","","","","", "","","","","", ""))){
                                $stmt = null;
                                echo '<script type="text/javascript">'; 
                                echo 'alert("salio algo mal en la base de datos");';
                                echo 'window.location.href = "C:\xampp\htdocs\proyecto\editarUser.php";';
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
                                }else {

                                        include 'C:\xampp\htdocs\proyecto\connection.php';

                                        $selNew = "SELECT NEWS_ID FROM NEWS WHERE CREATED_BY = $id AND NEW_STATUS = 'En redaccion' OR NEW_STATUS = 'Terminada'";
                                        $resNew = $mysqli->query($selNew);
                                        while ($row = mysqli_fetch_assoc($resNew)) {

                                                $idNews = $row['NEWS_ID'];

                                                $delNew = "DELETE FROM NEWS WHERE CREATED_BY = $id AND NEW_STATUS = 'En redaccion' OR NEW_STATUS = 'Terminada'";
                                                $resNew2 = $mysqli->query($delNew);

                                                $upNew = "UPDATE NEWS SET USER_DELETED = '1' WHERE CREATED_BY = $id";
                                                $resNew3 = $mysqli->query($upNew);

                                                $delCate = "DELETE FROM NEWS_CATEGORIES WHERE NEWS_ID = $idNews";
                                                $resCate = $mysqli->query($delCate);

                                                $delClave = "DELETE FROM NEWS_CLAVE WHERE NEWS_ID = $idNews";
                                                $resClave = $mysqli->query($delClave);

                                                $delImage = "DELETE FROM NEWS_IMAGE WHERE NEWS_ID = $idNews";
                                                $resImage = $mysqli->query($delImage);
                                        }
                                        $selNew = NULL;
                                        $resNew = NULL;
                                        $delNew = NULL;
                                        $resNew2 = NULL;
                                        $upNew = NULL;
                                        $resNew3 = NULL;
                                        $delCate = NULL;
                                        $resCate = NULL;
                                        $delClave = NULL;
                                        $resClave = NULL;
                                        $delImage = NULL;
                                        $resImage = NULL;
                                } 
                        }
                
                        $stmt = null;
                }
        }

?>

