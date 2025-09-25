<?= $this->extend("layouts/layout_dashboard") ?>
<?= $this->section("content") ?>

<div class="content-box">
    <div class="content-title">
        Teste
    </div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, doloremque reprehenderit, vitae nam
    consequatur ex qui sed ipsum beatae distinctio tempore voluptatum delectus suscipit maxime eaque assumenda
    rem soluta in.
    <div class="mt-3">
        <a href="http://" class="btn-full btn-cig">Link</a>
        <a href="http://" class="btn-full btn-cig-outline"> Link</a>

    </div>
</div>
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-lg-6 col-12 p-0">
            <div class="content-box">
                <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum, dolorem.</h1>
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, ipsam.</h2>
                <h3>Lorem ipsum dolor sit amet consectetur.</h3>
                <h4>Lorem ipsum dolor sit amet consectetur.</h4>
                <h5>Lorem ipsum dolor sit amet consectetur.</h5>
                <h6>Lorem ipsum dolor sit amet consectetur.</h6>
            </div>
        </div>
        <div class="col-lg-6 col-12 p-0">
            <div class="content-box">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Sexo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Joao</td>
                            <td>20</td>
                            <td>masculino</td>
                        </tr>
                        <tr>
                            <td>Joao</td>
                            <td>20</td>
                            <td>masculino</td>
                        </tr>
                        <tr>
                            <td>Joao</td>
                            <td>20</td>
                            <td>masculino</td>
                        </tr>
                        <tr>
                            <td>Joao</td>
                            <td>20</td>
                            <td>masculino</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>