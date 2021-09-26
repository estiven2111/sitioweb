<?php
session_start();
//session_destroy();
$_SESSION['USUARIO'] = "";
include("./template/cabecera.php"); ?>


<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading text-uppercase">Bienvenidos a tecnoEAM!</div>
        <div class="masthead-heading ">Porque todo lo que piensas, se puede programar.</div> </br></br>

    </div>
</header>

<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Servicios</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Páginas Web, aplicaciones Móviles y escritorio</h4>
                <p class="text-muted">Trabajamos con diferentes lenguajes de programación, pensando en tus necesidades, proyectos y emprendimientos.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Mantenimiento y reparación de equipos</h4>
                <p class="text-muted">Realizamos mantenimiento y reparación de equipos de computo, software y hardware.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Sistematización</h4>
                <p class="text-muted">Si has pensado en darle un giro tecnológico a tu empresa, tenemos el conocimiento y las herramientas para que la tecnología trabaje 100% a tus necesidades. </p>
            </div>
        </div>
    </div></br>
</section>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"></h2>
            <h3 class="section-subheading text-muted">Lenguajes de programación.</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logophp.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logolaravel.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logomysql.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <!-- Portfolio item 4-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logocchart.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                <!-- Portfolio item 5-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logoangular.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <!-- Portfolio item 6-->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logosql.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption"> </br></br>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logoandroid.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logoios.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logojavas.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logohtml.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="img/logocss.jfif" alt="..." />
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About-->
<section class="page-section" id="about">
    <div class="container"></br></br>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">TecnoEAM</h2></br>
            <h3 class="section-subheading text-muted">Construyendo tu futuro.</h3>
        </div></br></br>
        <ul style="text-align:center;">
            <li>
                <div class=""><img src="img/logotecnoeam.jpeg" style="height:500px; width:70% "  /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2020-2021</h4>
                        <h4 class="subheading">Trabajos Empresariales y personales.</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Desarrolladores de software, profesionales en programacion, sistemas y sistematizacion.</p>
                    </div> </br>
                </div>
                <li class="dinone"><img style="margin-right: 15px;height: 80px;position: relative;top: 5px;" src="IMAGENES/whatsapp.png" alt=""><a href=""></br> Whatsapp</a></li>
            </li>


        </ul>
    </div>
</section>



<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contacto</h2>
            <h3 class="section-subheading text-muted">Escríbenos, Nuestro trabajo es que te conozcan.</h3> </br>
        </div>

        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">

                        <input class="form-control" id="name" type="text" placeholder="Nombre*" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es requerido</div> </br>
                    </div>
                    <div class="form-group">

                        <input class="form-control" id="email" type="email" placeholder="Correo*" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">El correo es requerido</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Correo no valido</div> </br>
                    </div>
                    <div class="form-group mb-md-0">

                        <input class="form-control" id="phone" type="tel" placeholder="Numero de telefono *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">El telefomno es requerido</div> </br>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group form-group-textarea mb-md-0">

                        <textarea class="form-control" id="message" placeholder="Mensaje *" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Un mensaje es requerido</div>
                    </div>
                </div>
            </div>

            <div class="overlay"></div>



        </div>
    </div>
</section>

    <footer>
        <div class="col-lg-8 mx-auto text-center">
            <div class="container">
                <p>© <?php echo date('Y');  ?> All Rightse Reserved. Design by<a > TecnoEAM</a></p>
            </div>
        </div>
    </footer>



    </body>

    </html>