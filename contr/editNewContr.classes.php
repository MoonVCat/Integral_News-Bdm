<?php

include "../classes/editNews.classes.php";

    class editNewContr extends editNews{

        private $idNews;
        private $hora;
        private $fecha;
        private $titulo;
        private $pais;
        private $ciudad;
        private $colonia;
        private $descCorta;
        private $desc;
        private $firma;
        private $urgente;

        public function __construct($idNews, $hora, $fecha, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma, $urgente){
            $this->idNews = $idNews;
            $this->hora = $hora;
            $this->fecha = $fecha;
            $this->titulo = $titulo;
            $this->pais = $pais;
            $this->ciudad = $ciudad;
            $this->colonia = $colonia;
            $this->descCorta = $descCorta;
            $this->desc = $desc;
            $this->firma = $firma;
            $this->urgente = $urgente;
        }

        public function editNew2(){
            //Registro de usuario

            $this->editNew($this->idNews, $this->hora, $this->fecha, $this->titulo, $this->pais, $this->ciudad,  $this->colonia, $this->descCorta, $this->desc, $this->firma, $this->urgente);
        }
    }


?>