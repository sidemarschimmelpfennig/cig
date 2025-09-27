<?= $this->extend('layouts/layout_auth') ?>
<?= $this->section('content') ?>
<div class="login-box">
    <div class="text-center mb-3">
        <img src="<?= base_url("assets/images/logo.png") ?>" alt="">
    </div>

    <?= form_open("/auth/login") ?>
    <div class="mb-3">
        <p class="mb-2">Restaurante</p>
        <select name="select_restaurant" id="select_restaurant" class="form-select">
            <option value="" selected disabled>Selecione...</option>
            <?php foreach ($restaurants as $restaurant): ?>
                <?php
                $selected = '';
                if (!empty($select_restaurant) && $select_restaurant == $restaurant->id) {
                    $selected = 'selected';
                } ?>
                <option value="<?= Encrypt($restaurant->id) ?>" <?= $selected ?>><?= $restaurant->name ?></option>
            <?php endforeach ?>
        </select>
        <?= display_errors('select_restaurant', $validation_errors) ?>
    </div>

    <hr>
    <div class="mb-3">
        <input class="form-control" type="text" name="text_username" id="text_username" placeholder="Usuário"
            value="<?= old('text_username') ?>">
        <?= display_errors('text_username', $validation_errors) ?>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" name="text_password" id="text_password" placeholder="Senha"
            value="<?= old('text_password') ?>">
        <?= display_errors('text_password', $validation_errors) ?>
    </div>
    <div class="mb-3">
        <input type="submit" value="ENTRAR" class="btn-login px-4">
    </div>
    <?= form_close() ?>

    <div class="text-center">
        <p>Não tem conta <a href="#" class="login-link">Cadastre-se</a></p>
        <p><a href="#" class="login-link">Recuperar senha </a></p>
    </div>


</div>

<script>
    let wrapper = document.querySelector(".login-box");
    let loginData = [
        {
            username: "admin_rest1",
            password: "admin_rest1",
            restaurant: 1
        },
        {
            username: "user_rest1",
            password: "user_rest1",
            restaurant: 1
        },
        {
            username: "admin_rest2",
            password: "admin_rest2",
            restaurant: 2
        },
        {
            username: "user_rest2",
            password: "user_rest2",
            restaurant: 2
        },
        {
            username: "admin_rest3",
            password: "admin_rest3",
            restaurant: 3
        },
        {
            username: "user_rest3",
            password: "user_rest3",
            restaurant: 3
        },
    ]

    const select = document.createElement('select')
    select.appendChild(document.createElement('option'))
    select.setAttribute('name', 'select_login')
    loginData.forEach((item, i) => {
        const option = document.createElement('option')
        option.setAttribute('value', i)
        option.innerHTML = `Restaurante ${item.restaurant} - ${item.username} `;
        select.appendChild(option)
    })

    wrapper.appendChild(select)

    select.addEventListener('change', (e) => {
        const index = e.target.value;
        if (index == '') return
        const username = loginData[index].username;
        const password = loginData[index].password;
        const restaurant = loginData[index].restaurant;

        document.querySelector('#text_username').value = username
        document.querySelector('#text_password').value = password
        document.querySelector('#select_restaurant').selectedIndex = restaurant
    })
</script>
<?= $this->endSection() ?>