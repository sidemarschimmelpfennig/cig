<?= $this->extend("layouts/layout_dashboard") ?>
<?= $this->section("content") ?>
<?= $this->include('partials/page_title') ?>

<!-- new product -->
<div class="mb-3">
    <a href="<?= site_url("products/new") ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-plus me-2"></i>
        Novo Produto</a>
</div>

<!-- products list -->

<div class="text-center mt-5">
    <h4 class="opacity-50 mb-3"> Não existem produtos disponiveis </h4>
    <span>Clique <a href="<?= site_url("products/new") ?>">Aqui</a> para adicionar o primeiro produto do restaurante
    </span>
</div>

<?= $this->endsection() ?>