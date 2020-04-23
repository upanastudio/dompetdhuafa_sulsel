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