<?php

    $mysqli = new mysqli('localhost', 'root', '', 'integral_news');

    if($mysqli->connect_error){
        die('Error en la conexion' . $mysqli->connect_error);
    }
    
?> 


