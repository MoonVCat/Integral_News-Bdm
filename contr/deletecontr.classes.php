<?php

include '../classes/delete.classes.php';

        class deletecontr extends Delete{

            private $id;
            private $norepo;

            public function __construct($id, $norepo){

                $this->id = $id;
                $this->norepo = $norepo;
            }

            public function deleteUser(){

                $this->delete( $this->id, $this->norepo);
            }

        }

?>