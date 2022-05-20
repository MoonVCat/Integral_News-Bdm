<?php

include "../classes/news.classes.php";

    class NewContr extends News{

        private $hora;
        private $fecha;
        private $titulo;
        private $pais;
        private $ciudad;
        private $colonia;
        private $descCorta;
        private $desc;
        private $firma;
        private $idUser;
        private $urgente;

        public function __construct($hora, $fecha, $titulo, $pais, $ciudad, $colonia, $descCorta, $desc, $firma, $idUser, $urgente){
            $this->hora = $hora;
            $this->fecha = $fecha;
            $this->titulo = $titulo;
            $this->pais = $pais;
            $this->ciudad = $ciudad;
            $this->colonia = $colonia;
            $this->descCorta = $descCorta;
            $this->desc = $desc;
            $this->firma = $firma;
            $this->idUser = $idUser;
            $this->urgente = $urgente;
            
        }

        public function registerNew(){
            //Registro de usuario

            $this->new($this->hora, $this->fecha, $this->titulo, $this->pais, $this->ciudad,  $this->colonia, $this->descCorta, $this->desc, $this->firma,  $this->idUser, $this->urgente);
        }
    }


?>