<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo.png") ?>" type="image/png">
    <title>CigBurger Backoffice</title>
    <link rel="shortcut icon" href="<?= base_url("assets/images/logo.png") ?>" type="image/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets/library/bootstrap/bootstrap.min.css") ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url("assets/library/fontawesome/all.min.css") ?>">

    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url("assets/css/login.css") ?>">
</head>

<body class="login-page-background">
    <!-- render section -->
    <?= $this->renderSection("content") ?>

    <!-- import script bootstrap  -->
    <script src="<?= base_url("assets/library/bootstrap/bootstrap.bundle.min.js") ?>"></script>
</body>

</html>