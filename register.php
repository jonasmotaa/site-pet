<?php
if(isset($_POST['submit'])){

    include_once('assets/php/conexao.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  
try{
    mysqli_query($mysqli, "INSERT INTO usuario(email, nome, senha)
    VALUES ('$email','$nome','$senha')");
    echo "<script>alert('Usuário registrado com sucesso!');</script>";

}catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        // Código de erro 1062 é para duplicação de chave primária
        echo "<script>alert('O email já foi cadastrado no sistema.');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $e->getMessage() . "');</script>";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Amber - Pet Care Bootstrap 5 Template</title>

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
                            <p class="header-top-message">Cadastrar</p>
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
                                <a href="my-account.html" class="header-action-btn header-action-btn-wishlist">
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

    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Register Section Start -->
    <div class="section section-margin">
        <div class="container">
            <form action="register.php" method="POST">

                <div class="row">
                    <div class="col-lg-7 col-md-8 m-auto">
                        <div class="login-wrapper">

                            <!-- Register Title & Content Start -->
                            <div class="section-content text-center mb-6">
                                <h2 class="title mb-2">Criar uma conta</h2>
                            </div>
                            <!-- Register Title & Content End -->

                            <!-- Form Action Start -->
                            <form action="#" method="post">

                                <!-- Input First Name Start -->
                                <div class="single-input-item mb-2">
                                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome" required>
                                </div>
                                <!-- Input First Name End -->

                            

                                <!-- Input Email Start -->
                                <div class="single-input-item mb-2">
                                    <input type="email"  name="email" id="email" class="inputUser" placeholder="Email" required>
                                </div>
                                <!-- Input Email End -->

                                <!-- Input Password Start -->
                                <div class="single-input-item mb-2">
                                    <input type="password" name="senha" id="senha" class="inputUser" placeholder="Senha" required>
                                </div>
                                <!-- Input Password End -->

                                <!-- Button/Forget Password Start -->
                                    <div class="single-input-item">
                                   

                                        <div class="login-reg-form-meta mb-n3">
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-hover-dark">Criar conta</button>
                                        </div>
                                      
                                    </div>
                                
                                <!-- Button/Forget Password End -->

                            </form>
                            <!-- Form Action End -->

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Section End -->

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
                                    <li><a href="consulta.php">Consulta</a></li>
                                    <li><a href="vacina.php">Vacinas</a></li>
                                      <!-- <li><a href="atividade.html">Atividade</a></li> -->
                                    <!-- <li><a href="historico medico.html">Histórico médico</a></li> -->
                                    <!-- <li><a href="medicamento.html">Medicamentos</a></li> -->

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