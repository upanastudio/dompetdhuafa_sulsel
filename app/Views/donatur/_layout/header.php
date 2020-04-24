<body>
    <section id="kontak" class="no-print">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <a id="noTelpon" href="tel:+62217821292">
                                <i class="fa fa-phone-alt"></i> +62 411 4093458
                            </a>
                        </div>
                        <div class="col-sm-6 text-right social_link">
                            <button id="btnFacebook" class="btn btn-outline-link">
                                <img src="<?= $aset_url ?>media/facebook-logo.svg" class="" alt="facebook" />
                            </button>
                            <button id="btnTwitter" class="btn btn-outline-link">
                                <img src="<?= $aset_url ?>media/twitter-logo.svg" class="" alt="twitter" />
                            </button>
                            <button id="btnInstagram" class="btn btn-outline-link">
                                <img src="<?= $aset_url ?>media/instagram-logo.svg" class="" alt="instagram" />
                            </button>
                            <button id="btnYoutube" class="btn btn-outline-link">
                                <img src="<?= $aset_url ?>media/youtube-logo.svg" class="" alt="youtube" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (isset($carousel)) : ?>
        <section id="desktop-carousel">
            <div id="carouselDesktop" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-carousel" src="<?= $aset_url ?>media/carousel-1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img-carousel" src="<?= $aset_url ?>media/carousel-2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img-carousel" src="<?= $aset_url ?>media/carousel-3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselDesktop" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselDesktop" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <section id="mobile-carousel" style="display: none">
            <div id="carouselMobile" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img class="d-block w-100 img-carousel" src="<?= $aset_url ?>media/carousel-1a.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img-carousel" src="<?= $aset_url ?>media/carousel-2a.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img-carousel" src="<?= $aset_url ?>media/carousel-3a.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselMobile" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselMobile" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    <?php endif; ?>

    <section id="pencarian" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-inline d-flex justify-content-center md-form form-sm mt-2 mb-2">
                        <i class="fas fa-search icon-cari" aria-hidden="true"></i>
                        <input id="inpPencarian" class="form-control form-control-md ml-3 search-width" type="text" placeholder="ketik dan cari" aria-label="Search">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col d-xl-none no-print">
                    <button id="btnKonfirmasi" class="btn btn-link dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= $konfirmasi_donasi ?>">Konfirmasi</a>
                    </div>
                </div>
                <div class="col align-img">
                    <a href="<?= site_url() ?>"><img src="<?= $aset_url ?>media/logo_dd.png" class="logo-header" alt="dompetDhuafa" /></a>
                </div>
                <div class="col text-right btn-search-wrap no-print">
                    <a href="<?= $konfirmasi_donasi ?>" class="btn btn-link btn-search btn-konfirmasi">
                        Konfirmasi
                    </a>
                    <!-- <button id="btn-search" class="btn btn-link btn-search" onclick="pencarian()">
                        <span class="fa fa-search"></span>
                    </button> -->
                </div>
            </div>
        </div>
    </section>