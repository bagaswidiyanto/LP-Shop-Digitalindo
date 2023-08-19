<?php
function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;
        case 'Mon':
            $hari_ini = "Senin";
            break;
        case 'Tue':
            $hari_ini = "Selasa";
            break;
        case 'Wed':
            $hari_ini = "Rabu";
            break;
        case 'Thu':
            $hari_ini = "Kamis";
            break;
        case 'Fri':
            $hari_ini = "Jumat";
            break;
        case 'Sat':
            $hari_ini = "Sabtu";
            break;
        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }
    return "<b>" . $hari_ini . "</b>";
}
?>
<div class="container-fluid s-footer px-0">
    <img src="<?= base_url() ?>assets/img/s-footer.png" class="img-fluid" alt="">
</div>
<footer class="container-fluid text-light footer" id="location">
    <div class="container pb-5 pt-0 px-0">
        <div class="row gy-4 gy-lg-0 wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-lg-7">
                <div class="text-heading mb-5">
                    <h2><?= @$_GET['lang'] == 'eng' ? 'OUR LOCATION' : 'LOKASI KAMI' ?></h2>
                </div>
                <div class="row gy-5 gy-lg-0 mb-4">
                    <div class="col-md-7">
                        <div class="heading-footer mb-3">
                            <h4><?= @$_GET['lang'] == 'eng' ? 'Address' : 'Alamat' ?></h4>
                        </div>
                        <div class="address">
                            <?= $website->address; ?>
                        </div>
                        <div class="my-5">
                            <div class="heading-footer mb-3">
                                <h4><?= @$_GET['lang'] == 'eng' ? 'Contact Us' : 'Kontak Kami' ?></h4>
                            </div>
                            <div class="contact">
                                <?php
                                $number = $website->phone;
                                $n1 = substr($number, 0, 4);
                                $n2 = substr($number, 4, 4);
                                $n3 = substr($number, 8, 4);
                                $wa = $n1 . '-' . $n2 . '-' . $n3;
                                ?>
                                <p><?= $wa; ?></p>
                                <p><?= $website->email; ?></p>
                            </div>
                        </div>
                        <div class="sosmed">
                            <div class="d-flex mt-3">
                                <?php foreach ($sosmed as $s) { ?>
                                    <a class="btn btn-outline-light btn-social" href="<?= $s->link; ?>" target="_blank" title="<?= $s->name; ?>"><i class="<?= $s->icon; ?>"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="visitor">
                            <div class="row gy-5 align-items-center">
                                <div class="col-3 px-0">
                                    <div class="img text-end">
                                        <img src="<?= base_url() ?>assets/img/v-day.png" class="img-fluid w-50" alt="">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text">
                                        <p><?= @$_GET['lang'] == 'eng' ? date('l') : hari_ini() ?></p>
                                        <small><?= date('d F Y'); ?></small>
                                    </div>
                                </div>
                                <div class="col-3 px-0">
                                    <div class="img text-end">
                                        <img src="<?= base_url() ?>assets/img/v-today.png" class="img-fluid w-50" alt="">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text">
                                        <p><?= $today->jml; ?></p>
                                        <small><?= @$_GET['lang'] == 'eng' ? 'Visitor Today' : 'Pengunjung Hari ini' ?></small>
                                    </div>
                                </div>
                                <div class="col-3 px-0">
                                    <div class="img text-end">
                                        <img src="<?= base_url() ?>assets/img/v-online.png" class="img-fluid w-50" alt="">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text">
                                        <p><?= $online->jml; ?></p>
                                        <small><?= @$_GET['lang'] == 'eng' ? 'Online Visitor Today' : 'Pengunjung Online Hari Ini' ?></small>
                                    </div>
                                </div>
                                <div class="col-3 px-0">
                                    <div class="img text-end">
                                        <img src="<?= base_url() ?>assets/img/v-total.png" class="img-fluid w-75" alt="">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text">
                                        <p><?= $all->jml; ?></p>
                                        <small><?= @$_GET['lang'] == 'eng' ? 'Total Visitor' : 'Jumlah Pengunjung' ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <?= $website->map; ?>
            </div>
        </div>

    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <style>
                .copyright a:hover {
                    color: #FFC700;
                }
            </style>
            <div class="row d-flex justify-content-center  text-center">
                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-9 col-12">
                    <p>Copyright © 2023 - <a href="https://progimedia.com/" target="_blank">PROGIMEDIA</a> All Rights Reserved. Powered
                        by <a href="https://digitalindo.co.id/" target="_blank">Digitalindo</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>

<!-- =======================LAPTOP==================== -->
<?php
foreach ($this->db->query("SELECT * FROM tbl_detail_laptop")->result() as $modalLaptop) {
    $numberAPI = $website->phone;
    $n1API = substr($numberAPI, 1);
    $apiWa = $n1API;

    $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20laptop%20$modalLaptop->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20laptopnya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";
?>
    <!-- The Modal Detail Laptop-->
    <div class="modal" id="<?= $modalLaptop->id_img_laptop; ?>">
        <div class="modal-dialog modal-xl animated zoomIn">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?= @$_GET['lang'] == 'eng' ? 'Specification' : 'Spesifikasi' ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="single-product-area">
                        <div class="row gy-4 gy-lg-0">
                            <div class="col-lg-5">
                                <div class="owl-carousel laptop-carousel p-4">
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_detail_image_laptop WHERE header = '" . $modalLaptop->id_img_laptop . "' ORDER BY sort ASC")->result() as $mImg) { ?>
                                        <div class="card-img">
                                            <div class="img">
                                                <a href="https://shop103.digitalindo.co.id/upload/laptop/detail_laptop/<?= $mImg->image; ?>" data-fancybox="laptop-<?= $mImg->header; ?>" data-filter="#content_C" data-caption="">
                                                    <img src="https://shop103.digitalindo.co.id/upload/laptop/detail_laptop/<?= $mImg->image; ?>" class="img-fluid" alt="">
                                                </a>
                                                <!-- <img src="https://shop103.digitalindo.co.id/upload/laptop/detail_laptop/<?= $mImg->image; ?>" class="img-fluid" data-bs-toggle="modal" data-bs-target="#modalImg<?= $mImg->header; ?><?= $mImg->id; ?>" alt=""> -->
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="spesification ps-0 ps-lg-4">
                                    <div class="title">
                                        <h2 class="txt-blue fw-bold"><?= $modalLaptop->nama; ?></h2>
                                    </div>
                                    <div class="price">
                                        <p>Rp <?= number_format($modalLaptop->harga, 0, ",", "."); ?></p>
                                    </div>
                                    <div class="spek mt-4 mb-2">
                                        <p><?= @$_GET['lang'] == 'eng' ? 'Full specifications' : 'Spesifikasi lengkapnya' ?>
                                            :</p>
                                    </div>
                                    <div class="desk">
                                        <?= @$_GET['lang'] == 'eng' ? $modalLaptop->deskripsi_eng : $modalLaptop->deskripsi; ?>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div class="condition">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Condition' : 'Kondisi' ?></p>
                                            <span>
                                                <?php if ($modalLaptop->kondisi == 'Baru') { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'New' : 'Baru' ?>
                                                <?php } else { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'Second' : 'Bekas' ?>
                                                <?php } ?>
                                            </span>
                                        </div>
                                        <div class="stock ms-5">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Stock' : 'Stok' ?></p>
                                            <span>
                                                <?php if ($modalLaptop->stock == 'Ready') { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'Ready' : 'Tersedia' ?>
                                                <?php } else { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'Sold Out' : 'Habis' ?>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-buy mt-5">
                                        <a href="<?= $waLink; ?>" target="_blank" class="bg-yellow px-5 py-3 fw-bold txt-blue rounded-10"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= @$_GET['lang'] == 'eng' ? 'Close' : 'Tutup' ?></button>
                </div>

            </div>
        </div>
    </div>
    <!-- END The Modal Detail Laptop-->
<?php } ?>

<!-- =======================END LAPTOP==================== -->

<!-- =======================Printer==================== -->
<?php
foreach ($this->db->query("SELECT * FROM tbl_detail_printer")->result() as $modalPrinter) {
    $numberAPI = $website->phone;
    $n1API = substr($numberAPI, 1);
    $apiWa = $n1API;

    $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20printer%20$modalPrinter->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20printernya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";
?>
    <!-- The Modal Detail Printer-->
    <div class="modal" id="<?= $modalPrinter->id_img_printer; ?>">
        <div class="modal-dialog modal-xl animated zoomIn">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?= @$_GET['lang'] == 'eng' ? 'Specification' : 'Spesifikasi' ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="single-product-area">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="owl-carousel printer-carousel p-4">
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_detail_image_printer WHERE header = '" . $modalPrinter->id_img_printer . "' ORDER BY sort ASC")->result() as $mImg) { ?>
                                        <div class="card-img">
                                            <div class="img">
                                                <a href="https://shop103.digitalindo.co.id/upload/printer/detail_printer/<?= $mImg->image; ?>" data-fancybox="printer-<?= $mImg->header; ?>" data-filter="#content_C" data-caption="">
                                                    <img src="https://shop103.digitalindo.co.id/upload/printer/detail_printer/<?= $mImg->image; ?>" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="spesification ps-0 ps-lg-4">
                                    <div class="title">
                                        <h2 class="txt-blue fw-bold"><?= $modalPrinter->nama; ?></h2>
                                    </div>
                                    <div class="price">
                                        <p>Rp <?= number_format($modalPrinter->harga, 0, ",", "."); ?></p>
                                    </div>
                                    <div class="spek mt-4 mb-2">
                                        <p><?= @$_GET['lang'] == 'eng' ? 'Full specifications' : 'Spesifikasi lengkapnya' ?>
                                            :</p>
                                    </div>
                                    <div class="desk">
                                        <?= @$_GET['lang'] == 'eng' ? $modalPrinter->deskripsi_eng : $modalPrinter->deskripsi; ?>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div class="condition">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Condition' : 'Kondisi' ?></p>
                                            <span>
                                                <?php if ($modalLaptop->kondisi == 'Baru') { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'New' : 'Baru' ?>
                                                <?php } else { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'Second' : 'Bekas' ?>
                                                <?php } ?>
                                            </span>
                                        </div>
                                        <div class="stock ms-5">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Stock' : 'Stok' ?></p>
                                            <span>
                                                <?php if ($modalLaptop->stock == 'Ready') { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'Ready' : 'Tersedia' ?>
                                                <?php } else { ?>
                                                    <?= @$_GET['lang'] == 'eng' ? 'Sold Out' : 'Habis' ?>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="btn-buy mt-5">
                                        <a href="<?= $waLink; ?>" target="_blank" class="bg-yellow px-5 py-3 fw-bold txt-blue rounded-10"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= @$_GET['lang'] == 'eng' ? 'Close' : 'Tutup' ?></button>
                </div>

            </div>
        </div>
    </div>
    <!-- END The Modal Detail Printer-->
<?php } ?>

<!-- =======================END Printer==================== -->

<!-- =======================CUSTOM PC==================== -->
<?php
foreach ($this->db->query("SELECT * FROM tbl_detail_custom")->result() as $modalCustom) {
    $numberAPI = $website->phone;
    $n1API = substr($numberAPI, 1);
    $apiWa = $n1API;

    $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20untuk%20custom%20pc%20$modalCustom->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";
?>
    <!-- The Modal Detail Custom-->
    <div class="modal" id="<?= $modalCustom->id_img_custom; ?>">
        <div class="modal-dialog modal-xl animated zoomIn">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?= @$_GET['lang'] == 'eng' ? 'Specification' : 'Spesifikasi' ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="single-product-area">
                        <div class="row gy-4 gy-lg-0">
                            <div class="col-lg-5">
                                <div class="owl-carousel custom-carousel p-4">
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_detail_image_custom WHERE header = '" . $modalCustom->id_img_custom . "' ORDER BY sort ASC")->result() as $mImg) { ?>
                                        <div class="card-img">
                                            <div class="img">
                                                <a href="https://shop103.digitalindo.co.id/upload/custom/detail_custom/<?= $mImg->image; ?>" data-fancybox="custom-<?= $mImg->header; ?>" data-filter="#content_C" data-caption="">
                                                    <img src="https://shop103.digitalindo.co.id/upload/custom/detail_custom/<?= $mImg->image; ?>" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="spesification ps-0 ps-lg-4">
                                    <div class="title">
                                        <h2 class="txt-blue fw-bold"><?= $modalCustom->nama; ?></h2>
                                    </div>
                                    <div class="price">
                                        <p>Rp <?= number_format($modalCustom->harga, 0, ",", "."); ?></p>
                                    </div>
                                    <div class="spek mt-4 mb-2">
                                        <p><?= @$_GET['lang'] == 'eng' ? 'Full specifications' : 'Spesifikasi lengkapnya' ?>
                                            :</p>
                                    </div>
                                    <div class="desk">
                                        <?= @$_GET['lang'] == 'eng' ? $modalPrinter->deskripsi_eng : $modalPrinter->deskripsi; ?>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div class="condition">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Condition' : 'Kondisi' ?></p>
                                            <span><?= $modalCustom->kondisi; ?></span>
                                        </div>
                                        <div class="stock ms-5">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Stock' : 'Stok' ?></p>
                                            <span><?= $modalCustom->stock; ?></span>
                                        </div>
                                    </div>
                                    <div class="btn-buy mt-5">
                                        <a href="<?= $waLink; ?>" target="_blank" class="bg-yellow px-5 py-3 fw-bold txt-blue rounded-10"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= @$_GET['lang'] == 'eng' ? 'Close' : 'Tutup' ?></button>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- END The Modal Detail Custom-->
<?php } ?>

<!-- =======================END Custom PC==================== -->

<!-- =======================AKSESORIS==================== -->
<?php
foreach ($this->db->query("SELECT * FROM tbl_detail_aksesoris")->result() as $modalAksesoris) {
    $numberAPI = $website->phone;
    $n1API = substr($numberAPI, 1);
    $apiWa = $n1API;

    $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20aksesoris%20$modalAksesoris->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20aksesorisnya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";
?>
    <!-- The Modal Detail AKSESORIS-->
    <div class="modal" id="<?= $modalAksesoris->id_img_aksesoris; ?>">
        <div class="modal-dialog modal-xl animated zoomIn">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?= @$_GET['lang'] == 'eng' ? 'Specification' : 'Spesifikasi' ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="single-product-area">
                        <div class="row gy-4 gy-lg-0">
                            <div class="col-lg-5">
                                <div class="owl-carousel aksesoris-carousel p-4">
                                    <?php foreach ($this->db->query("SELECT * FROM tbl_detail_image_aksesoris WHERE header = '" . $modalAksesoris->id_img_aksesoris . "' ORDER BY sort ASC")->result() as $mImg) { ?>
                                        <div class="card-img">
                                            <div class="img">
                                                <a href="https://shop103.digitalindo.co.id/upload/aksesoris/detail_aksesoris/<?= $mImg->image; ?>" data-fancybox="aksesoris-<?= $mImg->header; ?>" data-filter="#content_C" data-caption="">
                                                    <img src="https://shop103.digitalindo.co.id/upload/aksesoris/detail_aksesoris/<?= $mImg->image; ?>" class="img-fluid" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="col-lg-7">
                                <div class="spesification ps-0 ps-lg-4">
                                    <div class="title">
                                        <h2 class="txt-blue fw-bold"><?= $modalAksesoris->nama; ?></h2>
                                    </div>
                                    <div class="price">
                                        <p>Rp <?= number_format($modalAksesoris->harga, 0, ",", "."); ?></p>
                                    </div>
                                    <div class="spek mt-4 mb-2">
                                        <p><?= @$_GET['lang'] == 'eng' ? 'Full specifications' : 'Spesifikasi lengkapnya' ?>
                                            :</p>
                                    </div>
                                    <div class="desk">
                                        <?= @$_GET['lang'] == 'eng' ? $modalPrinter->deskripsi_eng : $modalPrinter->deskripsi; ?>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div class="condition">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Condition' : 'Kondisi' ?></p>
                                            <span><?= $modalAksesoris->kondisi; ?></span>
                                        </div>
                                        <div class="stock ms-5">
                                            <p><?= @$_GET['lang'] == 'eng' ? 'Stock' : 'Stok' ?></p>
                                            <span><?= $modalAksesoris->stock; ?></span>
                                        </div>
                                    </div>
                                    <div class="btn-buy mt-5">
                                        <a href="<?= $waLink; ?>" target="_blank" class="bg-yellow px-5 py-3 fw-bold txt-blue rounded-10"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?= @$_GET['lang'] == 'eng' ? 'Close' : 'Tutup' ?></button>
                </div>
            </div>


        </div>
    </div>
    </div>
    <!-- END The Modal Detail AKSESORIS-->
<?php } ?>

<!-- =======================END AKSESORIS==================== -->



<?php
date_default_timezone_set('ASIA/JAKARTA');
$curr_time     = date('H:i:s');
?>
<div class="whatsapp-chat-section">
    <div class="icon-section">
        <img src="<?= base_url(); ?>assets/whatsapp/ic_whatsapp.png" id="whatsapp_chat" onclick="chatWhatsApp();">
    </div>
    <div id="whatsapp-chat-popup" class="animated bounceOutDown" style="z-index: 999999; display: none;">
        <div id="list-chat-section" class="list-chat-section animated fadeIn" style="display: block;">
            <div class="header-section" style="background:  linear-gradient(180deg, #2056A0 0%, #0264EB 100%)">
                <img class="close-chat-section" src="<?= base_url(); ?>assets/whatsapp/ic_close_btn.png" onclick="closechatWhatsApp();">
                <div class="header-avatar-section">
                    <?php foreach ($this->db->query("SELECT * FROM tbl_chat_wa order by id asc")->result() as $sec1) { ?>
                        <div class="avatar">
                            <img class="avatar" style="position: relative; display: inline-block; vertical-align: middle; height: 60px; width: 60px; border-radius: 60px;" src="https://shop103.digitalindo.co.id/upload/wa_image/<?= $sec1->image; ?>">
                        </div>
                    <?php } ?>
                </div>
                <div class="header-desc-section" style="margin-top: 15px;">
                    <p><?= @$_GET['lang'] == 'eng' ? 'We are ready to help you, please chat with our customer service.' : 'Kami siap membantu Anda, Silahkan chat dengan customer service kami.' ?>
                    </p>
                </div>
            </div>
            <div class="chat-section">
                <?php foreach ($this->db->query("SELECT * FROM tbl_chat_wa")->result() as $sec2) { ?>
                    <div class="cs-section" onclick="chatCustomer(<?= $sec2->id; ?>);">
                        <div class="avatar">
                            <img class="avatar" src="https://shop103.digitalindo.co.id/upload/wa_image/<?= $sec2->image; ?>">
                        </div>
                        <div class="profile">
                            <p class="position">Customer Service </p>
                            <h3 class="name"><?= strtoupper($sec2->nama); ?></h3>
                            <?php if (($curr_time >= $sec2->startOnline) && ($curr_time < $sec2->endOnline)) { ?>
                                <small class="status">Online <span class="online"><i class="fa fa-circle "></i></span>
                                </small>
                            <?php } else { ?>
                                <small class="status">Offline <span class="offline"><i class="fa fa-circle "></i></span>
                                </small>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php foreach ($this->db->query("SELECT * FROM tbl_chat_wa")->result() as $sec3) { ?>
            <div class="chat-section animated fadeIn" id="customer_chat_<?= $sec3->id; ?>" style="display: none;">
                <div class="header-section" style="background: linear-gradient(180deg, #2056A0 0%, #0264EB 100%)">
                    <img class="back-chat-section" src="<?= base_url(); ?>assets/whatsapp/ic_back_btn.png" onclick="backListChat(<?= $sec3->id; ?>);">
                    <div class="header-avatar-section">
                        <div class="avatar">
                            <img class="avatar" style="position: relative; display: inline-block; vertical-align: middle; height: 60px; width: 60px; border-radius: 60px;" src="https://shop103.digitalindo.co.id/upload/wa_image/<?= $sec3->image; ?>">
                        </div>
                    </div>
                    <div class="header-desc-section">
                        <h3><?= $sec3->nama; ?></h3>
                        <?php
                        $phone_split = implode(" ", str_split('+62' . $sec3->phone, 4)) . " ";
                        ?>
                        <p><i class="fa fa-phone"></i> <?php echo $phone_split; ?></p>
                    </div>
                </div>
                <div class="inside-chat-section">
                    <div class="chat">
                        <div class="inside-chat">
                            <span><?= @$_GET['lang'] == 'eng' ? 'Hello, I am' : 'Halo saya' ?>
                                <?= ucwords(strtolower($sec3->nama)); ?>, <?= @$_GET['lang'] == 'eng' ? 'from' : 'dari' ?>
                                <?= $website->name; ?></span>
                        </div>
                        <div class="time">
                            <span><?php echo date('H:i'); ?><img src="<?= base_url(); ?>assets/whatsapp/ic_check_wa.png"></span>
                        </div>
                    </div>
                    <div class="chat">
                        <div class="inside-chat">
                            <span><?= @$_GET['lang'] == 'eng' ? 'Can I help you ?' : 'Ada yang bisa saya bantu ?' ?></span>
                        </div>
                        <div class="time">
                            <span><?php echo date('H:i'); ?><img src="<?= base_url(); ?>assets/whatsapp/ic_check_wa.png"></span>
                        </div>
                    </div>
                </div>
                <div class="box-chat-section">
                    <div class="text">
                        <input type="hidden" id="telp_wa_<?= $sec3->id; ?>" name="telp_wa_<?= $sec3->id; ?>" value="<?= $sec3->phone; ?>">
                        <input type="text" class="input-message-whatsapp" id="chat_wa_<?= $sec3->id; ?>" name="chat_wa_<?= $sec3->id; ?>" onchange="textChatWhatsapp(<?= $sec3->id; ?>);" onclick="textChatWhatsapp(<?= $sec3->id; ?>);" onmouseover="textChatWhatsapp(<?= $sec3->id; ?>);" onmouseout="textChatWhatsapp(<?= $sec3->id; ?>);" onkeydown="textChatWhatsapp(<?= $sec3->id; ?>);" value="" placeholder="Type a message">
                    </div>
                    <div class="button-send">
                        <a href="" id="btn_wa_<?= $sec3->id; ?>" target="_blank"><img src="<?= base_url(); ?>assets/whatsapp/ic_send_message.png"></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<script src="assets/lib/wow/wow.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/lib/counterup/counterup.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/click-scroll.js"></script>

<script>
    $(document).ready(function() {
        $('[data-fancybox="gallery"]').fancybox({
            onInit: function(instance) {

                // Make zoom icon clickable
                instance.$refs.toolbar.find('.fancybox-zoom').on('click', function() {

                    if (instance.isScaledDown()) {
                        instance.scaleToActual();

                    } else {
                        instance.scaleToFit();
                    }

                });
            }
        });

        $.fancybox.defaults.buttons = [
            'slideShow',
            'fullScreen',
            'thumbs',
            'zoom',
            'close'
        ];

    });


    $('.nav-tabs-laptop a').click(function() {
        var this_desk = $(this).find("p").text();
        $('#product-laptop').html(this_desk + ' Procuct');
        return false;
    });


    $('.nav-tabs-printer a').click(function() {
        var this_desk = $(this).find("p").text();
        $('#product-printer').html(this_desk + ' Procuct');
        return false;
    });

    $('.nav-tabs-custom a').click(function() {
        var this_desk = $(this).find("p").text();
        $('#product-custom').html(this_desk + ' Procuct');
        return false;
    });

    $('.nav-tabs-aksesoris a').click(function() {
        var this_desk = $(this).find("p").text();
        $('#product-aksesoris').html(this_desk + ' Procuct');
        return false;
    });
</script>


<script type="text/javascript">
    function chatWhatsApp() {
        var cek_class = document.getElementById('whatsapp-chat-popup');
        if (cek_class.classList.contains('bounceOutDown')) {
            cek_class.classList.remove("bounceOutDown");
            cek_class.classList.add("bounceInUp");
            cek_class.style.display = "block";
        } else {
            cek_class.classList.remove("bounceInUp");
            cek_class.classList.add("bounceOutDown");
        }
    }

    function chatCustomer(id) {
        var list_chat = document.getElementById("list-chat-section");
        var chat = document.getElementById('customer_chat_' + id);

        if (id != 0 && id != '') {
            list_chat.style.display = "none";
            chat.style.display = "block";
        }
    }



    function closechatWhatsApp() {
        var cek_class = document.getElementById('whatsapp-chat-popup');
        if (cek_class.classList.contains('bounceInUp')) {
            cek_class.classList.remove("bounceInUp");
            cek_class.classList.add("bounceOutDown");
        }
    }


    function backListChat(id) {
        var list_chat = document.getElementById("list-chat-section");
        var chat = document.getElementById('customer_chat_' + id);
        if (id != 0 && id != '') {
            chat.style.display = "none";
            list_chat.style.display = "block";
            $("#chat_wa_" + id).val('');
        }
    }

    function textChatWhatsapp(id) {
        var link_wa = 'https://api.whatsapp.com/send?';
        if (id != 0 && id != '') {
            var telp = $("#telp_wa_" + id).val();
            var chat = $("#chat_wa_" + id).val();
            var link = 'https://api.whatsapp.com/send?phone=62' + telp + '&text=' + chat;
            var btn = document.getElementById("btn_wa_" + id);
            btn.setAttribute("href", link);
        }
    }

    function myFunction() {
        var x = document.getElementById("contact");
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById("fa").style.transform = "rotate(90deg)";
        } else {
            x.style.display = "none";
            document.getElementById("fa").style.transform = "rotate(0)";
        }
    }
</script>

</body>

</html>