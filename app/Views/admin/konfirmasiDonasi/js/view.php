<script src="<?= $assets_url ?>js/pages/dashboard.js"></script>
<script src="<?= $assets_url ?>js/jquery.dataTables.min.js"></script>
<script src="<?= $assets_url ?>js/dataTables.responsive.min.js"></script>
<script src="<?= $assets_url ?>js/dataTables.bootstrap4.min.js"></script>
<script>
    "use strict";
    $(document).ready(function() {
        $.fn.dataTable.Api.register('column().title()', function() {
            return $(this.header()).text().trim();
        });
        $("#tblKonfimasiDonasi").DataTable({
            responsive: true,
            columnDefs: [{
                    targets: "_all",
                    className: 'text-center'
                },
                {
                    targets: [5, 6, 7, 8, 9],
                    className: 'none',
                },
                {
                    targets: [-1],
                    responsivePriority: -1
                }

            ]
        });
    });
</script>