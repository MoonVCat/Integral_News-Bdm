<?php

include "../contr/registercontr.classes.php";

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pwd = $_POST["pass1"];
        $username = $_POST["username"];
        $telephone = $_POST["telephone"];
        $confirm = $_POST["pass2"];

        
        if(isset($_GET['id'])){
            $reportero = $_GET['id'];
        }

        
        if(!empty($_FILES["imagen"]["name"])){

            $fileName = basename($_FILES["imagen"]["name"]);
            $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedTypes = array('png', 'jpg', 'gif');

            if(in_array($imageType, $allowedTypes)){
                                            //el nombre tmp_name es temporal, es donde se guarda el archivo en el apache
                $imageName = $_FILES["imagen"]["tmp_name"];
                $base64Image = base64_encode(file_get_contents($imageName)); //se transformara en un string base64
                $realImage = 'data:image/'.$imageType.';base64,'.$base64Image; //para concatenar en php se usa el punto "."
                
                //ImageContr::withImage($realImage)->uploadImage(); //referencia explicita ::
                $register = new RegisterContr($email, $pwd, $confirm, $username, $telephone, $realImage, $reportero);
                $register->registerUser();

                if($reportero == 1){
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Holi nuevo Reportero <3.");';
                    echo 'window.location.href = "../editarUser.php";';
                    echo '</script>';
                }  else{
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Registro exitoso <3.");';
                    echo 'window.location.href = "../login.php";';
                    echo '</script>';
                }
                
            }else{

                header("location: ../registro.php?error=no_valid_extension"); 
                exit();
            }
        }else{

            header("location: ../registro.php"); 
            exit();
        }

        
    }

?>