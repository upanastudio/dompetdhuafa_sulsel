    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
        COPYRIGHT &copy; 2020 DOMPET DHUAFA | Powered by <a href="http://bit.ly/upanastudio" target="_blank">Upana Studio</a>.
        <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= $assets_url ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= $assets_url ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $assets_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= $assets_url ?>js/adminlte.js"></script>

    <?php if ($js) echo view($js); ?>

    </body>

    </html>