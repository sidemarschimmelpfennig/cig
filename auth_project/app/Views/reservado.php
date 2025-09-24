<?= $this->extend("layout/main_layout") ?>
<?= $this->section("content") ?>
<div class="container my-5">
    <div class="row">
        <div class="col">
            <h4>Area Reservada</h4>
        </div>
        <div class="col text-end">
            <span class="me-3"><?= session()->username ?></span>
            <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
</div>
<?= $this->endsection() ?>