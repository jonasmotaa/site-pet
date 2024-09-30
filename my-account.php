<?php
session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php'); // se nao existir sessao, retorna para login.php

}

include_once('assets/php/conexao.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM pet WHERE dono = '$email'";
$result =  $mysqli->query($sql);


function calcularIdade($dataNascimento) {
    // Cria um objeto DateTime a partir da data de nascimento fornecida
    $dataNasc = new DateTime($dataNascimento);
    $dataAtual = new DateTime(); // Data atual

    // Calcula a diferença entre a data atual e a data de nascimento
    $idade = $dataAtual->diff($dataNasc);

    // Retorna a idade em anos
    return $idade->y;
}


if(isset($_POST['submit'])){

    include_once('assets/php/conexao.php');

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $especie = $_POST['especie'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];



    mysqli_query($mysqli, "INSERT INTO pet(nome, idade, especie, peso, altura, dono)
    VALUES ('$nome','$idade','$especie', '$peso', '$altura', '$email')");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minha Conta</title>

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
<style>
 
    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 600px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    .card h2 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-left: auto;
        margin-right: auto;

    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
</style>

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
                            <p class="header-top-message">Área do usuário</p>
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

    <!-- My Account Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">

                            <div class="row">
                                
                                <!--DADOS DO PET-->

                                <div class="card">
                                    <h2>Pets</h2>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Idade</th>
                                                <th>Espécie</th>
                                                <th>Peso</th>
                                                <th>Altura</th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         while($userdata = mysqli_fetch_assoc($result)){

                                             echo "<tr>";
                                             echo "<td>".$userdata['nome']."</td>";
                                             echo "<td>".calcularIdade($userdata['idade'])."</td>";
                                            echo "<td>".$userdata['especie']."</td>";
                                            echo "<td>".$userdata['peso']."</td>";
                                            echo "<td>".$userdata['altura']."</td>";
                                            echo "<td>
                                            
                                                <a class='btn btn-sm btn-danger' href='delete.php?id=$userdata[id]' title='Deletar'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                                    </svg>
                                                </a>
                                                </td>";


                                            echo "<tr>";
                                        }


                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--DADOS DO PET-->

                                 <!-- Register Section Start -->
    <div class="section section-margin">
        <div class="container">
            <form action="my-account.php" method="POST">

                <div class="row">
                    <div class="col-lg-7 col-md-8 m-auto">
                        <div class="login-wrapper">

                            <!-- Adicionar pet -->
                            <div class="section-content text-center mb-6">
                                <h2 class="title mb-2">Adicionar pet</h2>
                            </div>
                            <!-- Adicionar pet -->

                            <!-- Form Action Start -->
                            <form action="#" method="post">

                                <!-- Input Name Start -->
                                <div class="single-input-item mb-2">
                                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome" required>
                                </div>
                                <!-- Input Name End -->

                            

                                <!-- Input Idade Start -->
                                <div class="single-input-item mb-2">
                                <input class="rounded-0 w-100 input-area data" type="text" name = "idade" id="idade" class = "inputUser" placeholder="Data de nascimento" onfocus="this.type = 'date'" onblur="this.type = 'text'" required>
                                </div>
                                <!-- Input Idade End -->

                                <!-- Input especie Start -->
                                <div class="single-input-item mb-2">
                                    <input type="text"  name="especie" id="especie" class="inputUser" placeholder="Espécie" required>
                                </div>
                                <!-- Input Especie End -->

                                <!-- Input peso Start -->
                                <div class="single-input-item mb-2">
                                    <input type="number" min = "0" name="peso" id="peso" class="inputUser" placeholder="Peso em Kg" required>
                                </div>
                                <!-- Input peso End -->

                                <!-- Input altura Start -->
                                <div class="single-input-item mb-2">
                                    <input type="number" min = "0" name="altura" id="altura" class="inputUser" placeholder="Altura em Cm">
                                </div>
                                <!-- Input altura End -->

                                <!-- Button -->
                                    <div class="single-input-item">
                                   

                                        <div class="login-reg-form-meta mb-n3">
                                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-hover-dark"> Adicionar pet</button>
                                        </div>
                                      
                                    </div>
                                
                                <!-- Button -->

                            </form>
                            <!-- Form Action End -->

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Section End -->

                            <!-- My Account Tab Menu Start -->
                            <div class="col-lg-10 col-md-40">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                   
                                    <a href="sair.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">


                                    

                                    

                                </div>
                            </div>
                            <!-- My Account Tab Content End -->

                        </div>
                    </div>
                    <!-- My Account Page End -->

                </div>
            </div>

        </div>
    </div>
    <!-- My Account Section End -->

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