<?php

include "../classes/news2.classes.php";

    class New2Contr extends News2{

        private $uno;

        public function __construct($uno, $cateV, $claveV, $color, $idCate){
            $this->uno = $uno;
            $this->cateV = $cateV;
            $this->claveV = $claveV;
            $this->color = $color;
            $this->idCate = $idCate;
        }

        public function registerNew2(){
            //Registro de usuario
            if( $this->cateV == 1){
                $this->cate2($this->uno, $this->color, $this->idCate);
            } else if( $this->claveV == 1){
                $this->clave2($this->uno);
            }
            
        }
    }


?>