<?php
error_reporting(0);
if (@$_GET['lang'] != '') {
    $_SESSION['lang'] = $_GET['lang'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $website->metaTitle; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="<?= $website->metaKeywords; ?>">
    <meta name="description" content="<?= $website->metaKeywords; ?>">


    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $website->metaTitle; ?>" />
    <meta property="og:description" content="<?= $website->metaDescription; ?>" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:image" content="<?= base_url() ?>assets/img/og-image-ak.png" />

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/icon-url.png" sizes="32x32">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Ubuntu:400,500,700' rel='stylesheet'>

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/swiper.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/whatsapp_chat.css" rel="stylesheet">
</head>

<body class="bg-white" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Navbar & Hero Start -->
    <section class="container-fluid position-relative p-0 hero-img">
        <nav class="navbar navbar-expand-lg navbar-light px-0 px-lg-5 py-2 py-lg-3">
            <div class="container">
                <a href="" class="navbar-brand p-0">
                    <!-- <h1 class="m-0">FitApp</h1> -->
                    <img class="img-fluid" src="https://shop103.digitalindo.co.id/upload/<?= $website->image; ?>" alt="EMCO SCHOP">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav py-0 ms-auto">
                        <?php if (@$_GET['lang'] == 'eng') { ?>
                            <a href="#home" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n1->title_eng : $n1->title ?></a>
                            <a href="#about" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n2->title_eng : $n2->title ?></a>
                            <a href="#why-us" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n3->title_eng : $n3->title ?></a>
                            <a href="#laptop" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n4->title_eng : $n4->title ?></a>
                            <a href="#printer" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n5->title_eng : $n5->title ?></a>
                            <a href="#custom-pc" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n6->title_eng : $n6->title ?></a>
                            <a href="#aksesoris" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n7->title_eng : $n7->title ?></a>
                            <a href="#location" class="nav-item nav-link click-scroll"><?= @$_GET['lang'] == 'eng' ? $n8->title_eng : $n8->title ?></a>
                        <?php } else { ?>
                            <a href="#home" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n1->title_eng : $n1->title ?></a>
                            <a href="#about" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n2->title_eng : $n2->title ?></a>
                            <a href="#why-us" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n3->title_eng : $n3->title ?></a>
                            <a href="#laptop" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n4->title_eng : $n4->title ?></a>
                            <a href="#printer" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n5->title_eng : $n5->title ?></a>
                            <a href="#custom-pc" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n6->title_eng : $n6->title ?></a>
                            <a href="#aksesoris" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n7->title_eng : $n7->title ?></a>
                            <a href="#location" class="nav-item nav-link click-scroll ind"><?= @$_GET['lang'] == 'eng' ? $n8->title_eng : $n8->title ?></a>
                        <?php } ?>
                    </div>
                    <div class="top-language">
                        <div class="dropdown">
                            <button type="button" class="bg-transparent border-0 dropdown-toggle fs-13" data-bs-toggle="dropdown">
                                <?= @$_GET['lang'] == 'eng' ? '<span class="fi fi-gb"></span>' : '<span class="fi fi-id"></span>' ?>
                            </button>
                            <ul class="dropdown-menu" style="left: -25px;">
                                <style>
                                    .dropdown-item.lang_active {
                                        background: linear-gradient(180deg, #5B88C6 0%, #1E539C 100%);
                                        color: #fff;
                                    }

                                    .dropdown-item.lang {
                                        background: linear-gradient(180deg, #5B88C6 0%, #1E539C 100%);
                                        color: #fff;
                                    }
                                </style>
                                <li><a class="dropdown-item <?php
                                                            if (@$_GET['lang'] == 'eng') {
                                                                echo '';
                                                            } else {
                                                                echo 'lang';
                                                            }
                                                            ?>" href="<?= base_url(); ?>"> <span class="fi fi-id"></span> Indonesia</a>
                                </li>
                                <li><a class="dropdown-item <?php
                                                            if (@$_GET['lang'] == 'eng') {
                                                                echo 'lang_active';
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?>" href="<?= base_url(); ?>?lang=eng"><span class="fi fi-gb"></span> Inggris</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <?php
        $numberAPI = $website->phone;
        $n1API = substr($numberAPI, 1);
        $apiWa = $n1API;

        $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20dengan%20salah%20satu%20produk%20dari%20website%20https://shop.digitalindo.co.id/";
        ?>
        <div class="container-fluid hero-header py-5" id="home">
            <div class="container">
                <div class="row align-items-center gy-5 gy-lg-0">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="txt-blue mb-3 wow fadeInDown" data-wow-delay="0.2s">
                            <?= @$_GET['lang'] == 'eng' ?  $homeweb->title_eng :  $homeweb->title ?></h1>
                        <div class="desk-header mb-5 wow fadeInUp" data-wow-delay="0.2s">
                            <p class="mb-4 fw-light">
                                <?= @$_GET['lang'] == 'eng' ? $homeweb->deskripsi_eng : $homeweb->deskripsi ?></p>
                        </div>
                        <div class="pt-0 pt-lg-5 wow bounce" data-wow-delay="0.2s">
                            <a href="<?= $waLink ?>" target="_blank" class="bg-blue py-3 px-3 rounded-20 me-3 fw-bolder "><?= @$_GET['lang'] == 'eng' ? 'Get Offers' : 'Dapatkan Penawaran' ?></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="img">
                            <img src="<?= base_url() ?>assets/img/img-header.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>

                <div class="hero-fitur mt-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <div class="slider-container h-100">
                                <div class="swiper-container hero-fitur-slider h-100 py-5">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($produk as $p) { ?>
                                            <div class="swiper-slide">
                                                <div class="card-box" title="<?= $p->nama; ?>">
                                                    <div class="img">
                                                        <img src="https://shop103.digitalindo.co.id/upload/produk/<?= $p->image; ?>" class="img-fluid" alt="<?= $p->nama; ?>">
                                                    </div>
                                                    <div class="title">
                                                        <p><?= $p->nama; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Navbar & Hero End -->