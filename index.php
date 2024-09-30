<?php
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php'); // se nao existir sessao, retorna para login.php

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetCare</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Vendor CSS (Icon Font) -->


    <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/themify-icons-min.css" />



    <!-- Plugins CSS (All Plugins Files) -->



    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css" />



    <!-- Main Style CSS -->


    <link rel="stylesheet" href="assets/css/style.css" />



    <!-- Use the minified version files listed below for better performance and remove the files listed above -->


    <!-- 
<link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
<link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">  
-->


</head>

<body>
    <!-- Header Section Start -->
    <div class="header section">

        <!-- Header Top Start -->
        <div class="header-top bg-primary">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Header Top Message Start -->
                    <div class="col-12 col-lg-6">
                        <div class="header-top-msg-wrapper">
                            <p class="header-top-message">Seja bem vindo !</p>
                        </div>
                    </div>
                    
                    <!-- Header Top Message End -->

                </div>
            </div>
        </div>
        <!-- Header Top End -->

        <!-- Header Bottom Start -->
        <div class="header-bottom">
            <div class="header-sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- Header Logo Start -->
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="header-logo">
                                <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header menu removido-->

                        <!-- Header Action Start -->
                        <div class="col-lg-3 col-md-8 col-6">
                            <div class="header-actions">

                               

                                <!-- Header My Account Button Start -->
                                <a href="my-account.php" class="header-action-btn header-action-btn-wishlist">
                                    <i class="icon-user icons"></i>
                                </a>
                                <!-- Header My Account Button End -->

                                <!-- Header Action Button Start -->
                               <!--
                                 <div class="header-action-btn header-action-btn-cart d-none d-sm-flex">
                                    <a class="cart-visible" href="javascript:void(0)">
                                        <i class="icon-handbag icons"></i>
                                        <span class="header-action-num">3</span>
                                    </a>
                                    -->
                                    <!-- Header Cart Content Start -->
                                    <!-- REMOVIDO -->
                                    <!-- Header Cart Content End -->
 <!-- PARTE CARRINHO (REMOVIDO)
                                </div>
                               
                                 <div class="header-action-btn header-action-btn-cart d-flex d-sm-none">
                                    <a href="cart.html">
                                        <i class="icon-handbag icons"></i>
                                        <span class="header-action-num">3</span>
                                    </a>
                                </div> -->
                                <!-- Header Action Button End -->

                                <!-- Mobile Menu Hambarger Action Button Start -->
                                <a href="javascript:void(0)" class="header-action-btn header-action-btn-menu d-lg-none d-md-flex">
                                    <i class="icon-menu"></i>
                                </a>
                                <!-- Mobile Menu Hambarger Action Button End -->

                            </div>
                        </div>
                        <!-- Header Action End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom End -->

    </div>
    <!-- Header Section End -->

    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/slider/slider1-1.png" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-start">
                            <font color="white">
                                <h5 class="sub-title"> Seu melhor amigo precisa de viver bem.</h5>
                                <h2 class="title m-0">Cuide da saúde do seu pet</h2>
                            </font>
                           
                            <a href="consulta.html" class="btn btn-dark btn-hover-primary">Agende uma consulta</a>
                        </div>
                    </div>
                </div>

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/vacina/vacina.png" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-center text-md-end">
                            <h5 class="sub-title">Seu companheiro precisa de ter as vacinas em dia</h5>
                            <h2 class="title m-0">Cuide das vacinas do seu pet aqui</h2>
                            <a href="vacina.html" class="btn btn-dark btn-hover-primary">Vacinas</a>
                        </div>
                    </div>
                </div>

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/atividade/slider atividade.png" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-start">
                            <font color="white">
                                <h5 class="sub-title"> Atividades</h5>
                                <h2 class="title m-0">Coloque seu amigo em movimento!</h2>
                            </font>
                           
                            <a href="atividade.html" class="btn btn-dark btn-hover-primary">Veja as atividades</a>
                        </div>
                    </div>
                </div>

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/historico medico/slider historico medico.png" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-center text-md-end">
                            <h5 class="sub-title">Veja os exames e mantenha o cuidado do seu animal em dia.</h5>
                            <h2 class="title m-0">Cuide dos exames e diagnósticos do seu pet</h2>
                            <a href="historico medico.html" class="btn btn-dark btn-hover-primary">Histórico Médico</a>
                        </div>
                    </div>
                </div>
                
                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/medicamento/slider medicamento.png" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-start">
                            <font color="white">
                                <h5 class="sub-title"> Não esqueça de cuidar do seu melhor amigo</h5>
                                <h2 class="title m-0">Cuide da medicação do seu animal.</h2>
                            </font>
                           
                            <a href="medicamento.html" class="btn btn-dark btn-hover-primary">Medicamento</a>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-lg-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-lg-flex d-none"><i class="icon-arrow-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-lg-flex d-none"><i class="icon-arrow-right"></i></div>
            <!-- Swiper Navigation End -->
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Blog Grid Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 mb-n8">

                <div class="col mb-8">
                    <!-- Single Blog Start -->
                    <div class="single-blog-wrapper">

                        <!-- Blog Thumb Start -->
                        <div class="blog-thumb thumb-effect">
                            <a class="image" href="consulta.html">
                                <img class="fit-image" src="assets/images/consulta/consulta.png" alt="Blog Image">
                            </a>
                        </div>
                        <!-- Blog Thumb End -->

                        <!-- Blog Content Start -->
                        <div class="blog-content">
                            
                            <h2 class="blog-title"><a href="consulta.html">Agende uma consulta</a></h2>
                            <p>Cuide da saúde do seu melhor amigo.</p>
                        </div>
                        <!-- Blog Content End -->

                    </div>
                    <!-- Single Blog End -->
                </div>

                <div class="col mb-8">
                    <!-- Single Blog Start -->
                    <div class="single-blog-wrapper">

                        <!-- Blog Thumb Start -->
                        <div class="blog-thumb thumb-effect">
                            <a class="image" href="vacina.html">
                                <img class="fit-image" src="assets/images/vacina/vacinacao.png" alt="Blog Image">
                            </a>
                        </div>
                        <!-- Blog Thumb End -->

                        <!-- Blog Content Start -->
                        <div class="blog-content">
                            
                            <h2 class="blog-title"><a href="vacina.html">Vacinas</a></h2>
                            <p>Monitore a proteção do seu pet.</p>
                        </div>
                        <!-- Blog Content End -->

                    </div>
                    <!-- Single Blog End -->
                </div>

                <div class="col mb-8">
                    <!-- Single Blog Start -->
                    <div class="single-blog-wrapper">

                        <!-- Blog Thumb Start -->
                        <div class="blog-thumb thumb-effect">
                            <a class="image" href="atividade.html">
                                <img class="fit-image" src="assets/images/atividade/atividade.png" alt="Blog Image">
                            </a>
                        </div>
                        <!-- Blog Thumb End -->

                        <!-- Blog Content Start -->
                        <div class="blog-content">
                           
                            <h2 class="blog-title"><a href="atividade.html">Atividade</a></h2>
                            <p>Planeje o dia-a-dia do seu pet.</p>
                        </div>
                        <!-- Blog Content End -->

                    </div>
                    <!-- Single Blog End -->
                </div>

                <div class="col mb-8">
                    <!-- Single Blog Start -->
                    <div class="single-blog-wrapper">

                        <!-- Blog Thumb Start -->
                        <div class="blog-thumb thumb-effect">
                            <a class="image" href="historico medico.html">
                                <img class="fit-image" src="assets/images/historico medico/historico medico.png" alt="Blog Image">
                            </a>
                        </div>
                        <!-- Blog Thumb End -->

                        <!-- Blog Content Start -->
                        <div class="blog-content">
                            <div class="blog-meta">
                               
                            </div>
                            <h2 class="blog-title"><a href="historico medico.html">Histórico Médico</a></h2>
                            <p>Veja os diagnósticos e exames de seu pet.</p>
                        </div>
                        <!-- Blog Content End -->

                    </div>
                    <!-- Single Blog End -->
                </div>

                <div class="col mb-8">
                    <!-- Single Blog Start -->
                    <div class="single-blog-wrapper">

                        <!-- Blog Thumb Start -->
                        <div class="blog-thumb thumb-effect">
                            <a class="image" href="medicamento.html">
                                <img class="fit-image" src="assets/images/medicamento/medicamento.png" alt="Blog Image">
                            </a>
                        </div>
                        <!-- Blog Thumb End -->

                        <!-- Blog Content Start -->
                        <div class="blog-content">
                          
                            <h2 class="blog-title"><a href="medicamento.html">Medicamentos</a></h2>
                            <p>Lembre-se sempre de medicar seu companheiro.</p>
                        </div>
                        <!-- Blog Content End -->

                    </div>
                    <!-- Single Blog End -->
                </div>


            </div>
            
        </div>
    </div>
    <!-- Blog Grid Section End -->


           




    <!-- Footer Section Start -->
    <footer class="section footer-section">
        <!-- Footer Top Start -->
        <div class="footer-top bg-bright section-padding">
            <div class="container">
                <div class="row mb-n8">
                    <div class="col-12 col-sm-6 col-lg-3 mb-8" data-aos="fade-up" data-aos-duration="1000">
                        <div class="single-footer-widget">
                            <h1 class="widget-title">Sobre Nós</h1>
                            <p class="desc-content">Somos uma equipe apaixonada por animais e tecnologia, dedicada a criar soluções inovadoras para facilitar a vida dos tutores de pets.</p>
                           
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-8" data-aos="fade-up" data-aos-duration="1200">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Links úteis</h2>
                            <ul class="widget-list">
                                <li><a href="wishlist.html">Ajuda e Contato</a></li>
                                <li><a href="contact.html">Termos e condições</a></li>
                            </ul>
                        </div>
                    </div>
                
                   
                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom bg-light pt-4 pb-4">
            <div class="container">
                <div class="row align-items-center mb-n4">
                    <div class="col-md-6 text-center text-md-start order-2 order-md-1 mb-4">
                        <div class="copyright-content">
                            <p class="mb-0">© 2024 <strong>Beatriz Dalfior & Jonas Mota </strong></p>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!-- Footer Section End -->

    

    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top show" id="scroll-top">
        <i class="arrow-top ti-angle-double-up"></i>
        <i class="arrow-bottom ti-angle-double-up"></i>
    </a>
    <!-- Scroll Top End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu-wrapper">
        <div class="offcanvas-overlay"></div>

        <!-- Mobile Menu Inner Start -->
        <div class="mobile-menu-inner">

            <!-- Button Close Start -->
            <div class="offcanvas-btn-close">
                <i class="fa fa-times"></i>
            </div>
            <!-- Button Close End -->

            <!-- Mobile Menu Inner Wrapper Start -->
            <div class="mobile-menu-inner-wrapper">
               

                <!-- Mobile Menu Start -->
                <div class="mobile-navigation">
                    <nav>
                        <ul class="mobile-menu">
                           
                            <li class="has-children">
                                <a href="#">Páginas <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown">
                                    <li><a href="consulta.html">Consulta</a></li>
                                    <li><a href="vacina.html">Vacinas</a></li>
                                    <li><a href="atividade.html">Atividade</a></li>
                                    <li><a href="historico medico.html">Histórico médico</a></li>
                                    <li><a href="medicamento.html">Medicamentos</a></li>
                                    <li><a href="admin-messages.php">Criar Mensagens</a>

                                    <li><a href="my-account.php">Minha conta</a></li>
                                    <li><a href="login.php">Login | Registro</a></li>
                                </ul>
                            </li>
                           
                            <li><a href="about.html">Sobre</a></li>
                            <li><a href="contact.html">Contato</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Mobile Menu End -->

              
                <!-- Contact Links/Social Links Start -->
                <div class="mt-auto bottom-0">

                    <!-- Contact Links Start -->
                  
                    <!-- Contact Links End -->

                    <!-- Social Widget Start -->
                    <div class="widget-social">
                        <a title="Facebook" href="#"><i class="fa fa-facebook-f"></i></a>
                        <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        <a title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                        <a title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                    </div>
                    <!-- Social Widget Ende -->
                </div>
                <!-- Contact Links/Social Links End -->
            </div>
            <!-- Mobile Menu Inner Wrapper End -->

        </div>
        <!-- Mobile Menu Inner End -->
    </div>
    <!-- Mobile Menu End -->

    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->


    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>


    <!-- Plugins JS -->


    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/countdown.min.js"></script>
    <script src="assets/js/plugins/lightgallery-all.min.js"></script>


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->

    <!-- 
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>  
    -->

    <!--Main JS-->
    <script src="assets/js/main.js"></script>
</body>

</html>