<?= $this->extend('layouts/layout_auth') ?>
<?= $this->section('content') ?>
<div class="login-box">
    <div class="text-center mb-3">
        <img src="<?= base_url("assets/images/logo.png") ?>" alt="">
    </div>

    <form action="#" method="post" class="">
        <div class="mb-3">
            <p class="mb-2">Restaurante</p>
            <select name="select-restaurante" id="" class="form-select">
                <option value="" default></option>
                <option value="">Restaurante 1 </option>
                <option value="">Restaurante 2 </option>
                <option value="">Restaurante 3 </option>
            </select>
        </div>


        <hr>
        <div class="mb-3">
            <input class="form-control" type="email" id="text-email" placeholder="Email" class="w-100">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="text-password" placeholder="Senha" class="w-100">
        </div>
        <div class="mb-3">
            <input type="submit" value="ENTRAR" class="btn-login px-4">
        </div>
    </form>
    <div class="text-center">
        <p>Não tem conta <a href="#" class="login-link">Cadastre-se</a></p>
        <p><a href="#" class="login-link">Recuperar senha </a></p>
    </div>

</div>
<?= $this->endSection() ?>