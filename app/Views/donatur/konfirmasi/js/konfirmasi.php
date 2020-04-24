    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                // dropdownParent: $('section')
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            var date_input = $('input[name="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'dd MM yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>