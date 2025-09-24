<?= $this->extend("layout/main_layout") ?>
<?= $this->section("content") ?>
<div class="d-flex justify-content align-items-center bg-dark vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 rounded bg-light p-5">
                <h4 class="text-center">LOGIN</h4>
                <hr>
                <?= form_open('login_submit', ['novalidate' => true]) ?>
                <div class="mb-3">
                    <label for="text_user" class="form-label">Usuario</label>
                    <input type="text" name="text_user" id="text_user" class="form-control" required
                        value="<?= old('text_user') ?>">
                </div>
                <div class="mb-3">
                    <label for="text_password" class="form-label">Senha</label>
                    <input type="password" name="text_password" id="text_password" class="form-control" required
                        value="<?= old('text_password') ?>">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-secondary w-100">Entrar</button>
                </div>
                <?= form_close() ?>
                <?php
                if (!empty($validation_errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($validation_errors as $error): ?>
                            <div><?= $error ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($login_error)): ?>
                    <div class="alert alert-danger">
                        <strong>Credenciais incorretas</strong>
                        <div><?= $login_error ?></div>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>