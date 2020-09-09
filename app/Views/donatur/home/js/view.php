<script>
    var formDonasi = function() {
        var getSubdonasi = function() {
            $('#jenisDonasi').on('change', function(e) {
                $.ajax({
                    url: '<?= site_url('donatur/home/get-subdonasi') ?>',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id: $('#jenisDonasi').val()
                    },
                    success: function(data) {
                        if (data) {
                            $('#pengkhususanDonasi').html(data);
                            $('#pengkhususanDonasi').prop('disabled', false);
                        } else {
                            $('#pengkhususanDonasi').html('<option value="">- silahkan pilih -</option>');
                            $('#pengkhususanDonasi').prop('disabled', true);
                            $('#keteranganDonasi').html('<option value="">- silahkan pilih -</option>');
                            $('#keteranganDonasi').prop('disabled', true);
                        }
                    }
                });
            });
        };

        var getTargetDonasi = function() {
            $('#pengkhususanDonasi').on('change', function(e) {
                $.ajax({
                    url: '<?= site_url('donatur/home/get-target-donasi') ?>',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        id: $('#pengkhususanDonasi').val()
                    },
                    success: function(data) {
                        if (data) {
                            $('#keteranganDonasi').html(data);
                            $('#keteranganDonasi').prop('disabled', false);
                        } else {
                            $('#keteranganDonasi').html('<option value="">- silahkan pilih -</option>');
                            $('#keteranganDonasi').prop('disabled', true);
                        }
                    }
                });
            });
        };

        var maskOn = function() {
            $('.uang').mask('#.##0', {
                reverse: true
            });
            $('.select2').select2({
                placeholder: 'Negara',
                dropdownParent: $('#profilDonatur')
            });
        };

        var methodPembayaran = function() {
            $('#jenisDonasi').on('change', function(e) {
                let jd = $('#jenisDonasi option:selected').text();
                // console.log(jd);
                if (jd == 'Zakat') {
                    $('#metode-zakat').css('display', 'block');
                    $('#metode-sedekah').css('display', 'none');
                    $('#metodePembayaran1').prop('checked', true);
                    $('#metodePembayaran4').prop('checked', false);
                } else {
                    $('#metode-zakat').css('display', 'none');
                    $('#metode-sedekah').css('display', 'block');
                    $('#metodePembayaran1').prop('checked', false);
                    $('#metodePembayaran4').prop('checked', true);
                }
            });
        };

        return {
            init: function() {
                getSubdonasi();
                getTargetDonasi();
                maskOn();
                methodPembayaran();
            }
        };
    }();

    var submitForm = function() {
        var formsubmit = function() {
            $('#submit-btn').click(function(e) {
                let jd = $('#jenisDonasi option:selected').text();
                if ($("form#form-donasi").valid()) {
                    $.post("<?= site_url('donatur/home/submit-donasi') ?>", $("form#form-donasi").serialize() + '&' + $.param({
                            'jd': jd
                        }))
                        .done(function(response) {
                            // console.log(response);
                            if (response.noRef) {
                                window.location.href = `<?= site_url('donatur/ringkasan/ringkasan_donasi/') ?>${response.noRef}`;
                            }
                        })
                        .fail(function() {
                            console.log('Failed to send data!');
                        });
                }
            });
        };

        var formValidation = function() {
            $("form#form-donasi").validate({
                rules: {
                    jenisDonasi: {
                        required: true
                    },
                    jumlahDonasi: {
                        required: true
                    },
                    sapaan: {
                        required: true
                    },
                    namaLengkap: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    noTelp: {
                        required: true
                    },
                    metodePembayaran: {
                        required: true
                    }
                },
            });
        }

        return {
            init: function() {
                formsubmit();
                formValidation();
            }
        };
    }();
    jQuery(document).ready(function() {
        formDonasi.init();
        submitForm.init();
    });
</script>
<script>
    function infoTambahan() {
        var info = document.getElementById("infoTambahan");
        if (info.style.display === "none") {
            info.style.display = "block";
            $('.info-tambahan').text('[-] Sembunyikan Informasi tambahan')
        } else {
            info.style.display = "none";

            $('.info-tambahan').text('[+] Tampilkan Informasi tambahan')
        }
    }

    function pencarian() {
        var cari = document.getElementById("pencarian");
        if (cari.style.display === "none") {
            cari.style.display = "block";
        } else {
            cari.style.display = "none";
        }
    }
</script>
<script>
    var input = document.getElementById("inpPencarian");

    input.addEventListener("keyup", function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            window.location = "./pencarian.html";
        }
    })
</script>