<?php

include "../classes/register.classes.php";

    class RegisterContr extends Register{

        private $email;
        private $pwd;
        private $confirm;
        private $username;
        private $telephone;
        private $image;
        private $reportero;
        private $userType;

        public function __construct($email, $pwd, $confirm, $username, $telephone, $image, $reportero, $userType){
            $this->email = $email;
            $this->pwd = $pwd;
            $this->confirm = $confirm;
            $this->username = $username;
            $this->telephone = $telephone;
            $this->image = $image;
            $this->reportero = $reportero;
            $this->userType = $userType;
        }

        public function registerUser(){

            //validaciones

            if($this->emailVal() == false){
                //header("location: ../registro.php?error=tienepocafuerza");
                echo '<script type="text/javascript">'; 
                echo 'alert("El correo no es correcto");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';
                
                exit();
            }
            if($this->reportero != 1){
                if($this->strongPwd() == false){
                    //header("location: ../registro.php?error=tienepocafuerza");
                    echo '<script type="text/javascript">'; 
                    echo 'alert("La contraseña no cumple con los requerimientos! Debe de incluir 8 caracteres minimo, y debe incluir una mayúscula, minuscula, un carácter especial, y un número al menos.");';
                    echo 'window.location.href = "../registro.php";';
                    echo '</script>';
                    
                    exit();
                }
            }
             
            if($this->emptyInputs() == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=emptyInputs");

                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';
                                
                exit();
            }

            if($this->emptyImage() == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=emptyInputs");

                echo '<script type="text/javascript">'; 
                echo 'alert("imagenvacia");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';
                                
                exit();
            }

            if($this->matchPwd() == false){
                //echo 'rip en los inputs';
                echo '<script type="text/javascript">'; 
                echo 'alert("Las contraseñas no coinciden!!");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';
                exit();
            }
            
            if($this->checkUser($this->email) == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=userCheck");
                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe un usuario");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();
            
            }

            //Registro de usuario

            $this->register($this->email, $this->pwd, $this->username, $this->telephone, $this->image,  $this->reportero, $this->userType);
        }


        private function strongPwd(){
            $result = '';
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/';
            if(preg_match($pattern, $this->pwd)){
                $result = true;
            } else {
                $result = false;
            }
            return $result;
        }

        private function emailVal(){
            $result = '';
            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

            if(preg_match($pattern, $this->email)){
                $result = true;
            } else {
                $result = false;
            }
            return $result;

        }

        private function matchPwd(){
            $result = '';
            if($this->pwd !== $this->confirm){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }

        private function emptyImage(){
            $result = '';
            if( empty($this->image) ){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }

        private function emptyInputs(){
            $result = '';
            if( empty($this->email) || empty($this->pwd) || empty($this->username) || empty($this->telephone) ){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }

    
    
    }

    
?>