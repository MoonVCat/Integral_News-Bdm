<?php

include "../contr/configcontr.classes.php";
include "../contr/Imagecontr.classes.php";

    if (isset($_POST["submit"])) {

        $id =  $_SESSION["USER_ID"];
        $username = $_POST["username"];
        $nameCom = $_POST["nameCom"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $pwd = $_POST["pass1"];
        $confirm = $_POST["pass2"];
        $info = $_POST["info"];

        $update = new configContr($username, $nameCom, $telephone, $email, $pwd, $confirm, $info);
        $update->updateUser();

        if (!empty($_FILES["imagen"]["tmp_name"])) {

            $fileName = basename($_FILES["imagen"]["tmp_name"]);
            $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedTypes = array('png', 'jpg', 'jpeg');
            $imageName = $_FILES["imagen"]["tmp_name"];
            $image64 = base64_encode(file_get_contents($imageName));
            $realImage = 'data:image/' . $imageType . ';base64,' . $image64;
            ImageContr::withImage($realImage, $id)->uploadImage();
        }

        echo '<script type="text/javascript">';
        echo 'alert("Todo chido editao.");';

        if ($_SESSION["user_type"] == 1) {

            echo 'window.location.href = "../perfilEditor.php";';

            } else if ($_SESSION["user_type"] == 2) {

                echo 'window.location.href = "../perfilReportero.php";';

            } else if ($_SESSION["user_type"] == 3) {
                echo 'window.location.href = "../perfilUsuario.php";';
            }

        echo '</script>';
    }

?>