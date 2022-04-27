<?php
include_once ('../classes/Image.classes.php');
    class ImageContr extends Imagen{

        private $idNew;
        private $idImg;
        private $image;
        private $id;
        private $realImage;
        private $imageType;

        public function __construct(){ }
    
        public static function withImage($image,$id){
            $instance = new self();
            $instance->fillWithImage($image,$id);
            return $instance;
        }
        protected function fillWithImage($image,$id){
            $this->image = $image;
            $this->id=$id;
        }
        public function uploadImage(){
            $this->upload($this->image,$this->id);
        }


        public static function withImage2($realImage, $imageType, $titulo){
            $instance = new self();
            $instance->fillWithImage2($realImage, $imageType, $titulo);
            return $instance;
        }

        protected function fillWithImage2($realImage, $imageType, $titulo){
            $this->realImage = $realImage;
            $this->imageType = $imageType;
            $this->titulo = $titulo;
        }
        public function uploadImage2(){
            $this->upload2($this->realImage, $this->imageType, $this->titulo);
        }



        public static function withImageEdit($idNew, $idImg, $realImage, $imageType, $titulo){
            $instance = new self();
            $instance->fillWithImageEdit($idNew, $idImg, $realImage, $imageType, $titulo);
            return $instance;
        }

        protected function fillWithImageEdit($idNew, $idImg, $realImage, $imageType, $titulo){
            $this->idNew = $idNew;
            $this->idImg = $idImg;
            $this->realImage = $realImage;
            $this->imageType = $imageType;
            $this->titulo = $titulo;
        }
        public function uploadImageEdit(){
            if($this->idImg == ""){
                $this->insertEdit($this->idNew, $this->realImage, $this->imageType);
            }else{
                $this->uploadEdit($this->idNew, $this->idImg , $this->realImage, $this->imageType, $this->titulo);
            }
           
        }
        public function uploadTitleEdit(){
           
                $this->uploadEdit($this->idNew, $this->idImg , $this->realImage, $this->imageType, $this->titulo);
            
        }

    }
?>