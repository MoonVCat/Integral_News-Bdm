<?php

include "../classes/config.classes.php";

    class configContr extends Config{

        private $username;
        private $nameCom;
        private $telephone;
        private $email;
        private $pwd;
        private $confirm;
        private $info;

        public function __construct($username, $nameCom, $telephone, $email, $pwd, $confirm, $info){

            $this->username = $username;
            $this->nameCom = $nameCom;
            $this->telephone = $telephone;
            $this->email = $email;
            $this->pwd = $pwd;
            $this->confirm = $confirm;
            $this->info = $info;

            
        }

        public function updateUser(){

            //validaciones
            
            if(!empty($this->pwd) || !empty($this->confirm)){

                if($this->strongPwd() == false){
                    //header("location: ../registro.php?error=tienepocafuerza");
                    echo '<script type="text/javascript">'; 
                    echo 'alert("La contraseña no cumple con los requerimientos! Debe de incluir 8 caracteres minimo, y debe incluir una mayúscula, minuscula, un carácter especial, y un número al menos.");';
                    echo 'window.location.href = "../conf.php";';
                    echo '</script>';
                    
                    exit();
                }

                if($this->matchPwd() == false){
                    //echo 'rip en los inputs';
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Las contraseñas no coinciden!!");';
                    echo 'window.location.href = "../conf.php";';
                    echo '</script>';
                    exit();
                }
                

            }
           
            if($this->checkUser($this->email) == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=userCheck");
                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe un usuario");';
                echo 'window.location.href = "../conf.php";';
                echo '</script>';

                exit();
            
            }

            //Registro de usuario

            $this->config( $this->username, $this->nameCom, $this->telephone, $this->email, $this->pwd, $this->info);
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

        private function matchPwd(){
            $result = '';
            if($this->pwd !== $this->confirm){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }

       
    
    }

    
?>