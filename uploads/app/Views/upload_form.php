<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?= form_open_multipart('upload_submit') ?>
    <input type="file" name="file_upload">
    <input type="submit" value="Enviar">
    <?= form_close() ?>
    <?php if (!empty($error)): ?>
        <p style="color: red"><?= $error ?></p>
    <?php endif ?>
</body>

</html>