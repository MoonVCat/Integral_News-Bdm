<?php
include '../classes/deleteCate.classes.php';


        class deleteCateContr extends deleteCate{

            private $id;

            public function __construct($id){

                $this->id = $id;
            }

            public function deleteCate(){

                $this->delete( $this->id);
            }

        }

?>