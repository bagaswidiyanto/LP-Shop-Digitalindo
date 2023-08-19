<section class="container xxl brand px-0 wow fadeInUp" data-wow-delay="0.2s">
    <div class="container pb-4 pb-lg-5 pt-5 px-lg-5">
        <div class="img">
            <?php foreach ($brand as $brand) { ?>
                <img src="https://shop103.digitalindo.co.id/upload/brand/<?= $brand->image; ?>" class="img-fluid" alt="<?= $brand->nama; ?>" title="<?= $brand->nama; ?>">
            <?php } ?>
        </div>
    </div>
</section>


<section class="container-fluid about position-relative" id="about">
    <img src="https://shop103.digitalindo.co.id/upload/about/<?= $about->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $about->title_eng : $about->title ?>">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="caption wow fadeInUp" data-wow-delay="0.2s">
                    <div class="header-title mb-3 mb-md-4">
                        <h2><?= @$_GET['lang'] == 'eng' ? $about->title_eng : $about->title ?></h2>
                    </div>
                    <div class="text pt-4">
                        <p><?= @$_GET['lang'] == 'eng' ? $about->deskripsi_eng : $about->deskripsi; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-xxl why-us px-0" id="why-us">
    <div class="container pt-4 pt-md-5 px-lg-5">
        <div class="row justify-content-between align-items-center bg-yl position-relative py-5">
            <div class="col-md-4 px-0">
                <div class="img">
                    <img src="https://shop103.digitalindo.co.id/upload/why_us/<?= $why_us->image; ?>" class="img-fluid" alt="<?= $why_us->title; ?>">
                </div>
            </div>
            <div class="col-md-8 pt-5 pt-md-0">
                <div class="header-title mb-4wow fadeInUp" data-wow-delay="0.2s">
                    <h3><?= @$_GET['lang'] == 'eng' ? $why_us->title_eng : $why_us->title; ?></h3>
                </div>
                <div class="title wow fadeInUp" data-wow-delay="0.2s">
                    <p><?= @$_GET['lang'] == 'eng' ? $why_us->deskripsi_eng : $why_us->deskripsi; ?></p>
                </div>
                <div class="overage mt-5">
                    <div class="row gy-4 gy-lg-0 justify-content-center">
                        <?php foreach ($keunggulan as $k) { ?>
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                                <div class="card-box">
                                    <div class="img mb-3">
                                        <img src="https://shop103.digitalindo.co.id/upload/keunggulan/<?= $k->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $k->title_eng : $k->title; ?>">
                                    </div>
                                    <p class="txt-blue fw-bold"><?= @$_GET['lang'] == 'eng' ? $k->title_eng : $k->title; ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-xxl laptop" id="laptop">
    <div class="container py-4 py-lg-5 px-0">
        <div class="caption">
            <div class="row align-items-center gy-4 gy-md-0 wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-7">
                    <div class="header-title mb-4">
                        <h2><?= $laptop->title; ?></h2>
                    </div>
                    <p><?= @$_GET['lang'] == 'eng' ? $laptop->deskripsi_eng : $laptop->deskripsi; ?></p>
                </div>
                <div class="col-md-5">
                    <div class="img text-center">
                        <img src="https://shop103.digitalindo.co.id/upload/laptop/<?= $laptop->image; ?>" class="img-fluid" alt="<?= $laptop->title; ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-laptop">
            <div class="scroll">
                <ul class="nav nav-tabs nav-tabs-laptop row wow fadeInUp" data-wow-delay="0.2s" id="myTab">
                    <?php
                    foreach ($tab_laptop as $tl) {
                        $active = $this->db->query("SELECT * FROM tbl_master_tab_laptop ORDER BY id ASC")->row();
                        if ($active->id == $tl->id) {
                            $act = 'active';
                        } else {
                            $act = '';
                        } ?>
                        <li class="nav-item col-md-3 col-sm-4 col-6">
                            <a href="#tab-laptop-<?= $tl->id; ?>" class="nav-link <?= $act ?>" data-bs-toggle="tab" title="<?= @$_GET['lang'] == 'eng' ? $tl->nama_eng : $tl->nama; ?>">
                                <div class="d-flex justify-content-center align-items-center w-100">
                                    <div class="img">
                                        <img src="https://shop103.digitalindo.co.id/upload/laptop/master_tab/<?= $tl->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $tl->nama_eng : $tl->nama; ?>">
                                    </div>
                                </div>
                                <p><?= @$_GET['lang'] == 'eng' ? $tl->nama_eng : $tl->nama; ?></p>
                            </a>
                        </li>

                    <?php } ?>
                </ul>
            </div>
            <div class="py-3">
                <h5 class="txt-blue fw-bold" id="product-laptop">
                    <?= @$_GET['lang'] == 'eng' ? $txt_laptop->nama_eng . ' Product' : $txt_laptop->nama . ' Produk'; ?>
                </h5>
            </div>
            <div class="tab-content wow fadeInUp" data-wow-delay="0.2s">
                <?php foreach ($this->db->query("SELECT * FROM tbl_master_tab_laptop")->result() as $tc) {
                    $active = $this->db->query("SELECT * FROM tbl_master_tab_laptop ORDER BY id ASC")->row();
                    if ($active->id == $tc->id) {
                        $act = 'show active';
                    } else {
                        $act = '';
                    }
                ?>

                    <div class="tab-pane fade <?= $act ?>" id="tab-laptop-<?= $tc->id ?>">
                        <div class="row gy-3">
                            <?php
                            foreach ($this->db->query("SELECT a.nama, a.slug, a.harga, a.intel, a.ram, a.vga, a.id_img_laptop FROM tbl_detail_laptop a LEFT JOIN tbl_master_tab_laptop b ON a.id_master_tab=b.id WHERE a.id_master_tab= '" . $tc->id . "'")->result() as $t) {
                                $imgLaptop = $this->db->query("SELECT c.image, c.sort FROM tbl_detail_laptop a LEFT JOIN tbl_master_tab_laptop b ON a.id_master_tab=b.id LEFT JOIN tbl_detail_image_laptop c ON a.id_img_laptop=c.header WHERE c.header = '" . $t->id_img_laptop . "' ORDER BY c.sort ASC  LIMIT 1")->row();

                                $name = substr($t->nama, 0, 65);

                                $numberAPI = $website->phone;
                                $n1API = substr($numberAPI, 1);
                                $apiWa = $n1API;

                                $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20laptop%20$t->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20laptopnya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";
                            ?>
                                <div class="col-lg-3 col-sm-4 col-6">
                                    <div class="card-box">
                                        <div class="position-relative h-100">
                                            <div class="img d-flex justify-content-center text-center mb-4">
                                                <div class="image-content w-fit position-relative">
                                                    <img src="https://shop103.digitalindo.co.id/upload/laptop/detail_laptop/<?= $imgLaptop->image; ?>" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                            <div class="information">
                                                <div class="price mb-3">
                                                    <p>Rp <?= number_format($t->harga, 0, ",", "."); ?></p>
                                                </div>
                                                <div class="title">
                                                    <?php if (strlen($name) < 65) { ?>
                                                        <p class="title-name txt-blue fw-bolder"><?= $name; ?></p>
                                                    <?php } else { ?>
                                                        <p class="title-name txt-blue fw-bolder"><?= $name; ?>...</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="spesification">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <img src="<?= base_url() ?>assets/img/img-intel.svg" class="img-fluid me-1" alt="">
                                                        <p><?= $t->intel; ?></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center w-50">
                                                            <img src="<?= base_url() ?>assets/img/img-ram.svg" class="img-fluid me-1" alt="">
                                                            <p class="w-100"><?= $t->ram; ?> GB</p>
                                                        </div>
                                                        <div class="d-flex align-items-center ms-2">
                                                            <img src="<?= base_url() ?>assets/img/img-vga.svg" class="img-fluid me-1" alt="">
                                                            <p class="w-100"><?= $t->vga; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-detail mt-3">
                                                        <a href="#" class="fs-10" data-bs-toggle="modal" data-bs-target="#<?= $t->id_img_laptop ?>"><?= @$_GET['lang'] == 'eng' ? 'Complete Specifications' : 'Spesifikasi Lengkap' ?>
                                                            >>></a>
                                                    </div>
                                                </div>
                                                <div class="btn-price-wa">
                                                    <a href="<?= $waLink; ?>" target="_blank" class="text-light fw-bold"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- <div class="tab-pane fade" id="tab-2">

                </div> -->


            </div>
        </div>
    </div>
</section>

<section class="container-xxl printer" id="printer">
    <div class="container pb-4 pb-lg-5 px-0">
        <div class="caption">
            <div class="row align-items-center gy-4 gy-md-0 wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-7">
                    <div class="header-title mb-4">
                        <h2><?= $printer->title; ?></h2>
                    </div>
                    <p><?= @$_GET['lang'] == 'eng' ? $printer->deskripsi_eng : $printer->deskripsi; ?></p>
                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <div class="img">
                        <img src="https://shop103.digitalindo.co.id/upload/printer/<?= $printer->image; ?>" class="img-fluid" alt="<?= $printer->title; ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-printer">
            <div class="scroll">
                <ul class="nav nav-tabs nav-tabs-printer row wow fadeInUp" data-wow-delay="0.2s" id="myTab">
                    <?php
                    foreach ($tab_printer as $tp) {
                        $active = $this->db->query("SELECT * FROM tbl_master_tab_printer ORDER BY id ASC")->row();
                        if ($active->id == $tp->id) {
                            $act = 'active';
                        } else {
                            $act = '';
                        }
                    ?>
                        <li class="nav-item col-md-3 col-sm-4 col-6">
                            <a href="#tab-printer-<?= $tp->id; ?>" class="nav-link <?= $act ?>" data-bs-toggle="tab" title="<?= @$_GET['lang'] == 'eng' ? $tp->nama_eng : $tp->nama; ?>">
                                <div class="d-flex justify-content-center align-items-center w-100">
                                    <div class="img">
                                        <img src="https://shop103.digitalindo.co.id/upload/printer/master_tab/<?= $tp->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $tp->nama_eng : $tp->nama; ?>">
                                    </div>
                                </div>
                                <p><?= @$_GET['lang'] == 'eng' ? $tp->nama_eng : $tp->nama; ?></p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="py-4">
                <h5 class="txt-blue fw-bold" id="product-printer">
                    <?= @$_GET['lang'] == 'eng' ? $txt_printer->nama_eng . ' Product' : $txt_printer->nama . ' Product'; ?>
                </h5>
            </div>
            <div class="tab-content wow fadeInUp" data-wow-delay="0.2s">
                <?php
                foreach ($this->db->query("SELECT * FROM tbl_master_tab_printer")->result() as $tp) {
                    $active = $this->db->query("SELECT * FROM tbl_master_tab_printer ORDER BY id ASC")->row();
                    if ($active->id == $tp->id) {
                        $act = 'show active';
                    } else {
                        $act = '';
                    }
                ?>
                    <div class="tab-pane fade <?= $act ?>" id="tab-printer-<?= $tp->id ?>">
                        <div class="row gy-3">
                            <?php
                            foreach ($this->db->query("SELECT a.nama,a.slug, a.harga, a.id_img_printer FROM tbl_detail_printer a LEFT JOIN tbl_master_tab_printer b ON a.id_master_tab=b.id WHERE a.id_master_tab= '" . $tp->id . "'")->result() as $contentPrinter) {
                                $imgPrinter = $this->db->query("SELECT c.image, c.sort FROM tbl_detail_printer a LEFT JOIN tbl_master_tab_printer b ON a.id_master_tab=b.id LEFT JOIN tbl_detail_image_printer c ON a.id_img_printer=c.header WHERE c.header = '" . $contentPrinter->id_img_printer . "' ORDER BY c.sort ASC  LIMIT 1")->row();

                                $name = substr($contentPrinter->nama, 0, 65);

                                $numberAPI = $website->phone;
                                $n1API = substr($numberAPI, 1);
                                $apiWa = $n1API;

                                $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20printer%20$contentPrinter->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20printernya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";
                            ?>
                                <div class="col-lg-3 col-sm-4 col-6">
                                    <div class="card-box">

                                        <div class="d-flex justify-content-center align-items-center w-100">
                                            <div class="img d-flex justify-content-center text-center mb-1">
                                                <div class="image-content w-fit position-relative">
                                                    <img src="https://shop103.digitalindo.co.id/upload/printer/detail_printer/<?= $imgPrinter->image; ?>" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="information position-relative">
                                            <div class="price mb-3">
                                                <p>Rp <?= number_format($contentPrinter->harga, 0, ",", "."); ?></p>
                                            </div>
                                            <div class="title">
                                                <?php if (strlen($name) < 65) { ?>
                                                    <p class="title-name txt-blue fw-bolder"><?= $name; ?></p>
                                                <?php } else { ?>
                                                    <p class="title-name txt-blue fw-bolder"><?= $name; ?>...</p>
                                                <?php } ?>
                                            </div>
                                            <div class="modal-detail mt-3">
                                                <a href="#" class="fs-10" data-bs-toggle="modal" data-bs-target="#<?= $contentPrinter->id_img_printer ?>"><?= @$_GET['lang'] == 'eng' ? 'Complete Specifications' : 'Spesifikasi Lengkap' ?>
                                                    >>></a>
                                            </div>
                                            <div class="btn-price-wa">
                                                <a href="<?= $waLink; ?>" target="_blank" class="text-light fw-bold"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="container-xxl printer custom" id="custom-pc">
    <div class="container py-0 py-lg-4 px-0">
        <div class="caption wow fadeInUp" data-wow-delay="0.2s">
            <div class="row align-items-center gy-4 gy-md-0">
                <div class="col-md-7">
                    <div class="header-title mb-4">
                        <h2><?= $custom->title; ?></h2>
                    </div>
                    <p><?= @$_GET['lang'] == 'eng' ? $custom->deskripsi_eng : $custom->deskripsi; ?></p>

                </div>
                <div class="col-md-5 d-flex justify-content-center">
                    <div class="img">
                        <img src="https://shop103.digitalindo.co.id/upload/custom/<?= $custom->image; ?>" class="img-fluid" alt="<?= $custom->title; ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-printer">
            <div class="scroll">
                <ul class="nav nav-tabs nav-tabs-custom row wow fadeInUp" data-wow-delay="0.2s" id="myTab">
                    <?php
                    foreach ($tab_custom as $tc) {
                        $active = $this->db->query("SELECT * FROM tbl_master_tab_custom ORDER BY id ASC")->row();
                        if ($active->id == $tc->id) {
                            $act = 'active';
                        } else {
                            $act = '';
                        }
                    ?>
                        <li class="nav-item col-md-3 col-sm-4 col-6">
                            <a href="#tab-custom-<?= $tc->id; ?>" class="nav-link <?= $act ?>" data-bs-toggle="tab" title="<?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?>">
                                <h5 class="title-top"><?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?></h5>
                                <div class="d-flex justify-content-center align-items-center w-100">
                                    <div class="img">
                                        <img src="https://shop103.digitalindo.co.id/upload/custom/master_tab/<?= $tc->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?>">
                                    </div>
                                </div>
                                <p class="title-bottom"><?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?></p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="py-4">
                <h5 class="txt-blue fw-bold" id="product-custom">
                    <?= @$_GET['lang'] == 'eng' ? $txt_custom->nama_eng : $txt_custom->nama; ?></h5>
            </div>
            <div class="tab-content wow fadeInUp" data-wow-delay="0.2s">
                <?php
                foreach ($this->db->query("SELECT * FROM tbl_master_tab_custom")->result() as $tc) {
                    $active = $this->db->query("SELECT * FROM tbl_master_tab_custom ORDER BY id ASC")->row();
                    if ($active->id == $tc->id) {
                        $act = 'show active';
                    } else {
                        $act = '';
                    }
                ?>
                    <div class="tab-pane fade <?= $act ?>" id="tab-custom-<?= $tc->id ?>">
                        <div class="row gy-3">
                            <?php
                            foreach ($this->db->query("SELECT a.nama, a.slug, a.harga, a.id_img_custom FROM tbl_detail_custom a LEFT JOIN tbl_master_tab_custom b ON a.id_master_tab=b.id WHERE a.id_master_tab= '" . $tc->id . "'")->result() as $contentCustom) {
                                $imgCustom = $this->db->query("SELECT c.image, c.sort FROM tbl_detail_custom a LEFT JOIN tbl_master_tab_custom b ON a.id_master_tab=b.id LEFT JOIN tbl_detail_image_custom c ON a.id_img_custom=c.header WHERE c.header = '" . $contentCustom->id_img_custom . "' ORDER BY c.sort ASC  LIMIT 1")->row();

                                $name = substr($contentCustom->nama, 0, 65);

                                $numberAPI = $website->phone;
                                $n1API = substr($numberAPI, 1);
                                $apiWa = $n1API;

                                $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20untuk%20custom%20pc%20$contentCustom->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";

                            ?>
                                <div class="col-lg-3 col-sm-4 col-6">
                                    <div class="card-box">

                                        <div class="d-flex justify-content-center align-items-center w-100">
                                            <div class="img d-flex justify-content-center text-center mb-1">
                                                <div class="image-content w-fit position-relative">
                                                    <img src="https://shop103.digitalindo.co.id/upload/custom/detail_custom/<?= $imgCustom->image; ?>" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="information position-relative">
                                            <div class="price mb-3">
                                                <p>Rp <?= number_format($contentCustom->harga, 0, ",", "."); ?></p>
                                            </div>
                                            <div class="title">
                                                <?php if (strlen($name) < 65) { ?>
                                                    <p class="title-name txt-blue fw-bolder"><?= $name; ?></p>
                                                <?php } else { ?>
                                                    <p class="title-name txt-blue fw-bolder"><?= $name; ?>...</p>
                                                <?php } ?>
                                            </div>
                                            <div class="modal-detail mt-3">
                                                <a href="#" class="fs-10" data-bs-toggle="modal" data-bs-target="#<?= $contentCustom->id_img_custom ?>"><?= @$_GET['lang'] == 'eng' ? 'Complete Specifications' : 'Spesifikasi Lengkap' ?>
                                                    >>></a>
                                            </div>
                                            <div class="btn-price-wa">
                                                <a href="<?= $waLink; ?>" target="_blank" class="text-light fw-bold"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<section class="container-xxl printer aksesoris" id="aksesoris">
    <div class="container pb-lg-4 pb-0 pt-5 px-0">
        <div class="caption wow fadeInUp" data-wow-delay="0.2s">
            <div class="row align-items-center gy-4 gy-md-0">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="img text-center">
                        <img src="https://shop103.digitalindo.co.id/upload/aksesoris/<?= $aksesoris->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $aksesoris->title_eng : $aksesoris->title; ?>">
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row justify-content-end">
                        <div class="col-lg-9">
                            <div class="header-title text-center text-md-end mb-4">
                                <h2><?= @$_GET['lang'] == 'eng' ? $aksesoris->title_eng : $aksesoris->title; ?></h2>
                            </div>
                        </div>
                    </div>
                    <p><?= @$_GET['lang'] == 'eng' ? $aksesoris->deskripsi_eng : $aksesoris->deskripsi; ?></p>

                </div>
            </div>
        </div>

        <div class="tab-printer">
            <div class="scroll">
                <ul class="nav nav-tabs nav-tabs-aksesoris row wow fadeInUp" data-wow-delay="0.2s" id="myTab">
                    <?php
                    foreach ($tab_aksesoris as $tc) {
                        $active = $this->db->query("SELECT * FROM tbl_master_tab_aksesoris ORDER BY id ASC")->row();
                        if ($active->id == $tc->id) {
                            $act = 'active';
                        } else {
                            $act = '';
                        }
                    ?>
                        <li class="nav-item col-md-2 col-sm-4 col-6">
                            <a href="#tab-aksesoris-<?= $tc->id; ?>" class="nav-link <?= $act ?>" data-bs-toggle="tab" title="<?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?>">
                                <div class="d-flex justify-content-center align-items-center w-100">
                                    <div class="img">
                                        <img src="https://shop103.digitalindo.co.id/upload/aksesoris/master_tab/<?= $tc->image; ?>" class="img-fluid" alt="<?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?>">
                                    </div>
                                </div>
                                <p><?= @$_GET['lang'] == 'eng' ? $tc->nama_eng : $tc->nama; ?></p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="py-4">
                <h5 class="txt-blue fw-bold" id="product-aksesoris">
                    <?= @$_GET['lang'] == 'eng' ? $txt_aksesoris->nama_eng : $txt_aksesoris->nama; ?></h5>
            </div>
            <div class="tab-content wow fadeInUp" data-wow-delay="0.2s">
                <?php
                foreach ($this->db->query("SELECT * FROM tbl_master_tab_aksesoris")->result() as $tc) {
                    $active = $this->db->query("SELECT * FROM tbl_master_tab_aksesoris ORDER BY id ASC")->row();
                    if ($active->id == $tc->id) {
                        $act = 'show active';
                    } else {
                        $act = '';
                    }
                ?>
                    <div class="tab-pane fade <?= $act ?>" id="tab-aksesoris-<?= $tc->id ?>">
                        <div class="row gy-3">
                            <?php
                            foreach ($this->db->query("SELECT a.nama, a.slug, a.harga, a.id_img_aksesoris FROM tbl_detail_aksesoris a LEFT JOIN tbl_master_tab_aksesoris b ON a.id_master_tab=b.id WHERE a.id_master_tab= '" . $tc->id . "'")->result() as $contentAksesoris) {
                                $imgaksesoris = $this->db->query("SELECT c.image, c.sort FROM tbl_detail_aksesoris a LEFT JOIN tbl_master_tab_aksesoris b ON a.id_master_tab=b.id LEFT JOIN tbl_detail_image_aksesoris c ON a.id_img_aksesoris=c.header WHERE c.header = '" . $contentAksesoris->id_img_aksesoris . "' ORDER BY c.sort ASC  LIMIT 1")->row();

                                $name = substr($contentAksesoris->nama, 0, 65);

                                $numberAPI = $website->phone;
                                $n1API = substr($numberAPI, 1);
                                $apiWa = $n1API;

                                $waLink = "https://api.whatsapp.com/send?phone=62$apiWa&text=Hallo%20Admin%20Emco%20Shop,%20Saya%20tertarik%20pada%20aksesoris%20$contentAksesoris->slug...%21%0AMau%20minta%20rekomendasi%20harga%20terbaik%20buat%20Aksesorisnya.%0ATerimakasih%20%E2%98%BA%EF%B8%8F%F0%9F%99%8F";

                            ?>
                                <div class="col-lg-3 col-sm-4 col-6">
                                    <div class="card-box">

                                        <div class="d-flex justify-content-center align-items-center w-100">
                                            <div class="img d-flex justify-content-center text-center mb-1">
                                                <div class="image-content w-fit position-relative">
                                                    <img src="https://shop103.digitalindo.co.id/upload/aksesoris/detail_aksesoris/<?= $imgaksesoris->image; ?>" class="img-fluid" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="information position-relative">
                                            <div class="price mb-3">
                                                <p>Rp <?= number_format($contentAksesoris->harga, 0, ",", "."); ?></p>
                                            </div>
                                            <div class="title">
                                                <?php if (strlen($name) < 65) { ?>
                                                    <p class="title-name txt-blue fw-bolder"><?= $name; ?></p>
                                                <?php } else { ?>
                                                    <p class="title-name txt-blue fw-bolder"><?= $name; ?>...</p>
                                                <?php } ?>
                                            </div>
                                            <div class="modal-detail mt-3">
                                                <a href="#" class="fs-10" data-bs-toggle="modal" data-bs-target="#<?= $contentAksesoris->id_img_aksesoris ?>"><?= @$_GET['lang'] == 'eng' ? 'Complete Specifications' : 'Spesifikasi Lengkap' ?>
                                                    >>></a>
                                            </div>
                                            <div class="btn-price-wa">
                                                <a href="<?= $waLink; ?>" target="_blank" class="text-light fw-bold"><?= @$_GET['lang'] == 'eng' ? 'Buy Now' : 'Beli Sekarang' ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>