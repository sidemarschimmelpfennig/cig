<?= $this->extend('layouts/layout_dashboard') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/page_title') ?>

<div class="content-box">
    <?= form_open_multipart('#', ['novalidate' => true]) ?>

    <div class="row">

        <div class="col-lg-4 col-12 px-5 pt-5">

            <!-- image -->
            <div class="text-center">
                <img class="product-image img-fluid" id="product_image">
            </div>

            <!-- file upload -->
            <div class="mt-3 text-start">
                <label for="file_image" class="form-label">Imagem do produto</label>
                <input type="file" name="file_image" id="file_image" class="form-control" accept="image/png">
            </div>

        </div>

        <div class="col-lg-6 col-12 p-5">

            <!-- name -->
            <div class="mb-3">
                <label for="name" class="form-label">Nome do produto</label>
                <input type="text" name="text_name" id="text_name" class="form-control" placeholder="Nome do produto">
            </div>

            <!-- description -->
            <div class="mb-3">
                <label for="description" class="form-label">Descrição do produto</label>
                <input type="text" name="text_description" id="text_description" class="form-control"
                    placeholder="Descrição do produto">
            </div>

            <!-- category and price -->
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="text_category" class="form-label">Categoria</label>
                        <input list="list_categories" name="text_category" id="text_category" class="form-control"
                            placeholder="Categoria">
                        <datalist id="list_categories">
                            <!-- <option value=""> -->
                        </datalist>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="price" class="form-label">Preço</label>
                        <input type="text" name="text_price" id="text_price" class="form-control" placeholder="Preço">
                    </div>
                </div>
            </div>

            <!-- available and promotion -->
            <div class="row">
                <div class="col-lg-6 col-12 align-self-center mb-3">
                    <input type="checkbox" name="check_available" id="check_available" checked>
                    <label for="check_available" class="form-label">Produto disponível.</label>
                </div>
                <div class="col-lg-6 col-12 mb-3">
                    <label for="promotion" class="form-label">Promoção</label>
                    <input type="text" name="text_promotion" id="text_promotion" class="form-control"
                        placeholder="Promoção">
                </div>
            </div>

            <!-- initial stock and stock minimum limit -->
            <div class="row">

                <div class="col-lg-6 col-12 mb-3">
                    <label for="initial_stock" class="form-label">Estoque inicial</label>
                    <input type="text" name="text_initial_stock" id="text_initial_stock" class="form-control"
                        placeholder="Estoque inicial">
                </div>

                <div class="col-lg-6 col-12 mb-3">
                    <label for="stock_minimum_limit" class="form-label">Limite mínimo de estoque</label>
                    <input type="text" name="text_stock_minimum_limit" id="text_stock_minimum_limit"
                        class="form-control" placeholder="Limite mínimo de estoque">
                </div>

            </div>

        </div>

        <!-- submit -->
        <div class="row">
            <div class="col px-5 pb-5">
                <a href="#" class="btn btn-outline-secondary px-5"><i class="fas fa-ban me-2"></i>Cancelar</a>
                <button type="submit" class="btn btn-outline-success px-5"><i class="fas fa-check me-2"></i>Criar
                    produto</button>
            </div>
        </div>

        <?= form_close() ?>
    </div>

</div>
<script>
    document.querySelector("#file_image").addEventListener("change", function () {
        const product_image = document.querySelector("#product_image")
        const file = this.files[0]
        let reader = new FileReader()

        reader.onloadend = function () {
            product_image.src = reader.result
        }

        if (file) {
            reader.readAsDataURL(file)
        } else {
            product_image.removeAttribute("src")
        }
    })
</script>

<?= $this->endSection() ?>