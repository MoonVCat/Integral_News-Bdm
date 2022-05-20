<?php

    include "../classes/category.classes.php";  

    class CateContr extends Category{

        private $id_color;
        private $id_nombre;
        private $id_order;

        public function __construct($id_color, $id_nombre, $id_order){
            $this->id_color = $id_color;
            $this->id_nombre = $id_nombre;
            $this->id_order = $id_order;
        }

        public function registerCate(){

            if($this->checkCate($this->id_nombre) == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=userCheck");
                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe una seccion");';
                echo 'window.location.href = "../crearCate.php";';
                echo '</script>';

                exit();
            
            }

            $this->categoryR($this->id_color, $this->id_nombre, $this->id_order);
        }

    }
?>