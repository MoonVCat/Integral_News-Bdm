<?php

include '../classes/doneNew.classes.php';

        class doneNewContr extends doneNew{

            private $id;
            private $comen;

            public function __construct($id, $comen){

                $this->id = $id;
                $this->comen = $comen;
            }

            public function doneNew(){

                $this->done( $this->id);
            }

            public function doneAprobarNew(){

                $this->aprobar( $this->id);
            }

            public function doneRepoNew(){

                $this->comen( $this->id, $this->comen);
            }
        
        }
