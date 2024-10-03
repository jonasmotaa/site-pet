<?php

session_start();
if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php'); // se nao existir sessao, retorna para login.php

}

include_once('assets/php/conexao.php');

$email = $_SESSION['email'];
$sql = "SELECT apelido FROM pet WHERE dono = '$email'";
$result =  $mysqli->query($sql);

if($result->num_rows == 0){
header('Location: vacina.php'); // se nao existir pet, retorna para vacina.php

}

if(isset($_POST['submit'])){


    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $vencimento = $_POST['vencimento'];
    $pet = $_POST['pet'];


    $idsql = "SELECT id FROM pet WHERE apelido = '$pet' AND dono = '$email'";
    $ids =  $mysqli->query($idsql);
    $row = $ids->fetch_assoc();
    $id = $row['id'];
    // aqui foi necessario converter o dado para uma string.

    mysqli_query($mysqli, "INSERT INTO vacina(nomevacina, descricao, data, vencimento, id)
                        VALUES ('$nome','$descricao','$data','$vencimento', '$id')");

    header("Location: registrovacina.php?status=success");
    exit();
                       
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registre uma Vacina - PetCare</title>

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
                            <p class="header-top-message"> Vacinas</p>
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

                        <!--header menu removido-->

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

    <!-- Breadcrumb Area Start -->
    <div class="section breadcrumb-area bg-bright">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-wrapper">
                        <h2 class="breadcrumb-title">Registre uma vacina</h2>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Blog Details Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto overflow-hidden">
                    <!-- Blog Details Wrapper Start -->
                    <div class="blog-details-wrapper">



                        <!-- Comments Post Area Start -->
                        <div class="comment-post-area">
                            <h2 class="blog-desc-title mb-3 pt-2">Registre sua vacina</h2>
                            <form action="registrovacina.php" method="POST">
                                <div class="row">

                                    <!-- nome vacina Start -->
                                    <div class="col-md-3 col-custom">
                                        <div class="input-item mb-2">
                                            <input class="rounded-0 w-100 input-area nome" type="text" name = "nome" id="nome" class = "inputUser" placeholder="Nome" required>
                                        </div>
                                    </div>
                                    <!-- nome vacina End -->

                                    <!-- PetInput Start -->
                                    <div class="col-md-3 col-custom">
                                    <div class="rounded-0 w-100 input-area nome">
                                        <select name = "pet" id="pet">
                                            <?php
                                            $pets = $result;
                                            ?>
                                           <?php foreach ($pets as $f) { 
                                            foreach ($f as $p){                                            
                                            
                                            ?>
                                            
                                                <option value=<?= $p; ?>><?= $p; ?></option>
                                            <?php
                                            ;}}?>

                                        
                                        </select>
                                        </div>
                                    </div>
                                    <!-- Pet Input End -->

                                    <!-- DataInput Start -->
                                    <div class="col-md-3 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="rounded-0 w-100 input-area data" type="text" name = "data" id="data" class = "inputUser" placeholder="Data" onfocus="this.type = 'date'" onblur="this.type = 'text'" required>
                                        </div>
                                    </div>
                                    <!-- Medico Input End -->

                                    <!-- Vencimento Input Start -->
                                    <div class="col-md-3 col-custom">
                                        <div class="input-item mb-4">
                                            <input class="rounded-0 w-100 input-area vencimento" type="text" name = "vencimento" id="vencimento" class = "inputUser" placeholder="Vencimento" onfocus="this.type = 'date'" onblur="this.type = 'text'" required>
                                        </div>
                                    </div>
                                    <!-- Data Input End -->

                                    <!-- Message Input Start -->
                                    <div class="col-12 col-custom">
                                        <div class="input-item mb-4">
                                            <textarea cols="30" rows="10" name="descricao" id="descricao" class="rounded-0 w-100 custom-textarea input-area" placeholder="Descrição" spellcheck="false" data-gramm="false"></textarea>
                                        </div>
                                    </div>
                                    <!-- Message Input End -->

                                    <!-- Submit Button Start -->
                                    <div class="col-12 col-custom mt-4">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary btn-hover-dark">Salvar Vacina</button>
                                    </div>
                                    <!-- Submit Button End -->

                                </div>
                            </form>
                        </div>
                        <!-- Comments Post Area End -->

                    </div>
                    <!-- Blog Details Wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->

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

    <!-- Modal Start  -->
    <div class="modalquickview modal fade" id="quick-view" tabindex="-1" aria-labelledby="quick-view" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="btn close" data-bs-dismiss="modal">×</button>
                <div class="row">
                    <div class="col-md-6 col-12">

                        <!-- Product Details Image Start -->
                        <div class="modal-product-carousel">

                            <!-- Single Product Image Start -->
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <a class="swiper-slide" href="#">
                                        <img class="w-100" src="assets/images/products/large-product/1.png" alt="Product">
                                    </a>
                                    <a class="swiper-slide" href="#">
                                        <img class="w-100" src="assets/images/products/large-product/2.png" alt="Product">
                                    </a>
                                    <a class="swiper-slide" href="#">
                                        <img class="w-100" src="assets/images/products/large-product/3.png" alt="Product">
                                    </a>
                                    <a class="swiper-slide" href="#">
                                        <img class="w-100" src="assets/images/products/large-product/4.png" alt="Product">
                                    </a>
                                    <a class="swiper-slide" href="#">
                                        <img class="w-100" src="assets/images/products/large-product/5.png" alt="Product">
                                    </a>
                                </div>

                                <!-- Swiper Pagination Start -->
                                <!-- <div class="swiper-pagination d-md-none"></div> -->
                                <!-- Swiper Pagination End -->

                                <!-- Next Previous Button Start -->
                                <div class="swiper-product-button-next swiper-button-next"><i class="ti-arrow-right"></i></div>
                                <div class="swiper-product-button-prev swiper-button-prev"><i class="ti-arrow-left"></i></div>
                                <!-- Next Previous Button End -->
                            </div>
                            <!-- Single Product Image End -->

                        </div>
                        <!-- Product Details Image End -->

                    </div>
                    <div class="col-md-6 col-12 overflow-hidden position-relative">

                        <!-- Product Summery Start -->
                        <div class="product-summery position-relative">

                            <!-- Product Head Start -->
                            <div class="product-head mb-3">
                                <h2 class="product-title">Single Product Slider</h2>
                            </div>
                            <!-- Product Head End -->

                            <!-- Rating Start -->
                            <span class="rating justify-content-start mb-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </span>
                            <!-- Rating End -->

                            <!-- Price Box Start -->
                            <div class="price-box mb-2">
                                <span class="regular-price">$70.00</span>
                                <span class="old-price"><del>$85.00</del></span>
                            </div>
                            <!-- Price Box End -->

                            <!-- SKU Start -->
                            <div class="sku mb-3">
                                <span>SKU: 12345</span>
                            </div>
                            <!-- SKU End -->

                            <!-- Product Inventory Start -->
                            <div class="product-inventroy mb-3">
                                <span class="inventroy-title"> <strong>Availability:</strong></span>
                                <span class="inventory-varient">12 Left in Stock</span>
                            </div>
                            <!-- Product Inventory End -->

                            <!-- Description Start -->
                            <p class="desc-content mb-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                            <!-- Description End -->

                            <!-- Quantity Start -->
                            <div class="quantity d-flex align-items-center justify-content-start mb-5">
                                <span class="me-2"><strong>Qty: </strong></span>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="text">
                                    <div class="dec qtybutton"></div>
                                    <div class="inc qtybutton"></div>
                                </div>
                            </div>
                            <!-- Quantity End -->

                            <!-- Cart Button Start -->
                            <div class="cart-btn action-btn mb-6">
                                <div class="action-cart-btn-wrapper d-flex justify-content-start">
                                    <div class="add-to_cart">
                                        <a class="btn btn-primary btn-hover-dark rounded-0" href="cart.html">Add to cart</a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="action"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                            <!-- Cart Button End -->

                            <!-- Social Shear Start -->
                            <div class="social-share">
                                <div class="widget-social justify-content-center mb-6">
                                    <a title="Twitter" href="#/"><i class="icon-social-twitter"></i></a>
                                    <a title="Instagram" href="#/"><i class="icon-social-instagram"></i></a>
                                    <a title="Linkedin" href="#/"><i class="icon-social-linkedin"></i></a>
                                    <a title="Skype" href="#/"><i class="icon-social-skype"></i></a>
                                    <a title="Dribble" href="#/"><i class="icon-social-dribbble"></i></a>
                                </div>
                            </div>
                            <!-- Social Shear End -->

                            <!-- Payment Option Start -->
                            <div class="payment-option mt-4 d-flex justify-content-start">
                                <span><strong>Payment: </strong></span>
                                <a href="#">
                                    <img class="fit-image ms-1" src="assets/images/payment/payment_large.png" alt="Payment Option Image">
                                </a>
                            </div>
                            <!-- Payment Option End -->

                        </div>
                        <!-- Product Summery End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End  -->

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
                                    <li><a href="vacina.php">Vacina</a></li>
                              

                                    <li><a href="my-account.php">Minha conta</a></li>
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

    <?php if (isset($_GET['status']) && $_GET['status'] == 'success') { ?>
    <script>
        alert("Vacina registrada com sucesso!");
    </script>
    <?php } ?>

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