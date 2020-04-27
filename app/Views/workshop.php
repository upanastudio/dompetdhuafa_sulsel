<html>

<head>
    <title>Upload Form</title>
</head>

<body>

    <?php echo $error; ?>

    <form action="<?= site_url('workshop/save_file') ?>" method="post" enctype="multipart/form-data">

        <input type="file" name="foto[]" size="20" multiple>

        <br /><br />

        <input type="submit" value="upload" />

    </form>

</body>

</html>