<?php

include "../classes/editNews2.classes.php";

    class editNew2Contr extends editNews2{

        private $idNews;
        private $uno;
        private $color;
        private $PK;
        private $idCate;

        public function __construct($idNews, $PK, $uno, $cateV, $claveV, $color, $idCate){
            $this->idNews = $idNews;
            $this->PK = $PK;
            $this->uno = $uno;
            $this->cateV = $cateV;
            $this->claveV = $claveV;
            $this->color = $color;
            $this->idCate = $idCate;
        }

        public function editNew2(){
            //Registro de usuario
            if($this->PK == ""){
                if( $this->cateV == 1){
                    $this->cateIn2($this->idNews, $this->uno, $this->color, $this->idCate);
                } else if( $this->claveV == 1){
                    $this->claveIn2($this->idNews, $this->uno);
                }
            }else{
                if( $this->cateV == 1){
                    $this->cate2($this->idNews, $this->PK, $this->uno, $this->color, $this->idCate);
                } else if( $this->claveV == 1){
                    $this->clave2($this->idNews, $this->PK, $this->uno);
                }
            }
            
        }
    }


?>