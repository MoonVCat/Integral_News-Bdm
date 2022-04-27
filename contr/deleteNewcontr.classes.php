<?php

include '../classes/deleteNew.classes.php';

        class deleteNewContr extends deleteNew{

            private $id;

            public function __construct($id){

                $this->id = $id;
            }

            public function deleteNew(){

                $this->delete( $this->id);
                
            }
        
        }

?>