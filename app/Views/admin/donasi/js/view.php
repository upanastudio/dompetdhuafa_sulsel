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
        $("#tblDonasi").DataTable({
            responsive: true,
            columnDefs: [{
                    targets: [0, 1, 2, -1],
                    className: 'text-center'
                }, {
                    targets: [0, 3, -1],
                    className: 'all'
                },
                {
                    targets: [-1],
                    responsivePriority: -1
                }
            ]
        });
    });
</script>