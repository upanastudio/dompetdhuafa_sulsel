<script>
    $('#pay-button').click(function(event) {
        event.preventDefault();

        var id = <?= $donasi->kodeUnik ?>;
        var price = <?= $donasi->totalPembayaran ?>;
        var quantity = 1;
        var name = "<?= $donasi->jenisDonasi ?>";
        var gross_amount = <?= $donasi->totalPembayaran ?>;
        var email = "<?= $donatur->email ?>";
        var first_name = "<?= $donatur->nama_donatur ?>";
        var phone = <?= $donatur->telepon ?>;
        var noref = <?= $donasi->noRefensi ?>;

        $.ajax({
            method: 'POST',
            url: '<?= base_url('Snap/snap/token') ?>',
            cors: true,
            headers: {
                'Access-Control-Allow-Origin': '*',
            },
            data: {
                id: id,
                price: price,
                quantity: quantity,
                name: name,
                gross_amount: gross_amount,
                email: email,
                first_name: first_name,
                phone: phone,
                noref: noref
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {
                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>