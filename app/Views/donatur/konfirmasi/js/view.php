<script>
    var someFunction = function() {
        $('#submit-btn').click(function(e) {
            let ref = $('#noRefrensi').val();
            console.log(ref);
            if (ref != '') {
                window.location.href = `<?= site_url('donatur/konfirmasi/') ?>${ref}`;
            }
        });
    }();

    jQuery(document).ready(function() {
        someFunction;
    });
</script>