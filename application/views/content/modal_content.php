<div class="single-product-area">
    <div class="row gy-4 gy-lg-0">
        <div class="col-lg-5">
            <div class="spek-img">
                <div class="owl-carousel screenshot-carousel p-4">

                    <?php foreach ($this->db->query("SELECT * FROM tbl_detail_image_laptop WHERE header = '" . $modalLaptop->id_img_laptop . "' ORDER BY sort ASC")->result() as $mImg) { ?>
                        <div class="card-img">
                            <div class="img">
                                <div class="image-content w-fit position-relative" data-bs-toggle="modal" data-bs-target="#modalImg<?= $mImg->header; ?><?= $mImg->id; ?>">
                                    <img src="https://shop103.digitalindo.co.id/upload/laptop/detail_laptop/<?= $mImg->image; ?>" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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


<div class="single-product-area">
    <div class="row gy-4 gy-lg-0">
        <div class="col-lg-5">
            <div class="spek-img">
                <div class="owl-carousel screenshot-carousel p-4">

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



<script type="text/javascript">
    $(".screenshot-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1000,
        loop: true,
        dots: false,
        items: 1,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
    });
</script>