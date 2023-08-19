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
                                                        <a href="#" class="fs-10 detail-laptop" data-laptop-id="<?= $t->id_img_laptop ?>">
                                                            <?= @$_GET['lang'] == 'eng' ? 'Complete Specifications' : 'Spesifikasi Lengkap' ?>
                                                            >>> </a>

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