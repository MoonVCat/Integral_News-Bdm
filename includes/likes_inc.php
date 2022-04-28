<?php
    include ('../classes/likes.classes.php');
  
    if(isset($_POST["like"])){

        $news=$_POST["likeNew"];

        $login = new LikeNews();
        $login->BuscarLike($news);

    }
?>