<?php
session_start();
require "connection.php";
include 'C:\xampp\htdocs\proyecto\templatess\headerNew.php';
include 'C:\xampp\htdocs\proyecto\templatess\navbar.php';


$new = "SELECT COLOR_ID, COLOR FROM COLORS ORDER BY COLOR ASC";
$resultado = $mysqli->query($new);

?>

<div class="content">
    <div class="preguntas">

        <div class="container text-center">
            <p>
            <h3>Espectaculos</h3>
            </p>
            <hr>
            <div class="titulo text-center">
                <div class="card-title  text-center">
                    <div class="bote text-right">
                        <a href="#" class="">
                            <i class='far fa-trash-alt' style='font-size:24px'></i>
                            <a href="#" class="">
                                <i class='far fa-save' style='font-size:24px'></i>
                            </a>
                        </a>
                    </div>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcZJIwdCzYcPsSf2voQZjpVaWsqJExllvZDg&usqp=CAU" class="img text-center " alt="...">
                    <h5 class="card-title text-center ">Nombre del usuario</h5>
                    <h6 class="card-title text-center ">FirmaReportero</h6>
                </div>

                <p class="card-text  text-center"><small class="text-muted">Marzo 2020</small>

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar2" fill="currentColor" xmlns="http://www.w3.org/200ssssss0/svg">
                        <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
                        <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
                    </svg>
                </p>
                <p class="card-text  text-center"><small class="text-muted">Apodaca, Nuevo Leon</small>
                <p class="card-text  text-center"><small class="text-muted">12am</small>


                </p>
                <h1>Titulo de la Noticia</h1>


            </div>
            <hr>

            <div class="contenido-notica text-center">
                <div class=" corto">

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit ad fuga eaque quo quae voluptatum vero rerum. Rem ratione accusamus corporis odit iure distinctio deleniti id, voluptatem quis debitis.
                    </p>
                </div>

                <img src="https://www.pandaancha.mx/plds/articulos/9c12d6ee10e89f4ab731cd4038eb9538600496443.png" alt="">
                <div class=" descrip">
                    <p>
                    <h5>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit ad fuga eaque quo quae voluptatum vero rerum. Rem ratione accusamus corporis odit iure distinctio deleniti id, voluptatem quis debitis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit ad fuga eaque quo quae voluptatum vero rerum. Rem ratione accusamus corporis odit iure distinctio deleniti id, voluptatem quis debitis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit ad fuga eaque quo quae voluptatum vero rerum. Rem ratione accusamus corporis odit iure distinctio deleniti id, voluptatem quis debitis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit ad fuga eaque quo quae voluptatum vero rerum. Rem ratione accusamus corporis odit iure distinctio deleniti id, voluptatem quis debitis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam suscipit ad fuga eaque quo quae voluptatum vero rerum. Rem ratione accusamus corporis odit iure distinctio deleniti id, voluptatem quis debitis.
                    </h5>
                    </p>
                </div>

                <a href="#" class="">
                    <i class='fas fa-heart' style='font-size:24px'></i>
                </a>

                <a href="#" class="">
                    <i class='far fa-heart' style='font-size:24px'></i>
                </a>


            </div>
        </div>



        <!-- Contenedor Principal -->
        <div class="comments-container">
            <h1>Comentarios</h1>

            <ul id="comments-list" class="comments-list">
                <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                        <!-- Contenedor del Comentario -->


                        <div class="comment-box">
                            <div class="comment-head">


                                <h6 class="comment-name by-author"><a href="">Edson Lugo</a></h6>
                                <span>hace 20 minutos</span>
                                <div class="boton-corazon text-right">
                                    <a href="#" class="">
                                        <i class='fas fa-heart' style='font-size:24px'></i>
                                    </a>
                                    <a href="#" class="">
                                        <i class='far fa-trash-alt' style='font-size:24px'></i>
                                    </a>

                                </div>
                            </div>


                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?


                            </div>

                        </div>
                    </div>
                    <!-- Respuestas de los comentarios -->
                    <ul class="comments-list reply-list">
                        <li>
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="">Rubí Alvarado</a></h6>
                                    <span>hace 10 minutos </span>
                                    <div class="boton text-right">
                                        <a href="#" class="">
                                            <i class='fas fa-heart' style='font-size:24px'></i>
                                        </a>


                                    </div>



                                </div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                </div>
                            </div>
                        </li>

                        <li>
                            <!-- Avatar -->
                            <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                            <!-- Contenedor del Comentario -->
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name by-author"><a href="">Edson Lugo</a></h6>
                                    <span>hace 10 minutos </span>
                                    <div class="boton-corazon text-right">
                                        <a href="#" class="">
                                            <i class='fas fa-heart' style='font-size:24px'></i>
                                        </a>
                                        <a href="#" class="">
                                            <i class='far fa-trash-alt' style='font-size:24px'></i>
                                        </a>
                                    </div>


                                </div>
                                <div class="comment-content">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name"><a href="">Rubí Alvarado</a></h6>
                                <span>hace 10 minutos </span>


                                <a href="#" class="">
                                    <i class='fas fa-heart' style='font-size:24px'></i>
                                </a>
                            </div>

                            <div class="comment-content">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <br>


        <form>
            <div class="form-group">
                <input type="text" publi="" pa="" placeholder="Agregar un comentario" class="form-control" style="height: 100px;" required>

                <ol>
                    <br>
                    <input type="submit" value="Agregar comentarios">

                </ol>

            </div>
        </form>
    </div>

</div>


<script src="jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

<?php include 'C:\xampp\htdocs\proyecto\templatess\footer.php'; ?>


</html>