<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cig Burger - <?= !empty($title) ? $title : '' ?> </title>

    <link rel="stylesheet" href="<?= base_url("assets/library/bootstrap/bootstrap.min.css") ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url("assets/library/fontawesome/all.min.css") ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
</head>

<body>
    <?php $user = (object) session()->get('user'); ?>


    <div class="overlay"></div>
    <?= view('partials/navbar', ['user' => $user]) ?>

    <main class="d-flex main-component">
        <aside class="main-menu p-2" id="sidebar">
            <?= view('partials/sidebar', ['user' => $user]) ?>
        </aside>
        <div class="content p-2" ">
            <?= $this->renderSection("content") ?>
        </div>

    </main>

    <?= $this->include('partials/footer') ?>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
            </script>
            <script>
                document.querySelector(".btn-main-menu").addEventListener("click", () => {
                    document.querySelector(".main-menu").classList.toggle("show")
                    document.querySelector(".content").classList.toggle("show")
                })

                document.querySelector(".content").addEventListener("click", () => {
                    document.querySelector(".main-menu").classList.remove("show");
                    document.querySelector(".content").classList.remove("show");
                });
            </script>
</body>

</html>