<div class="modal-header">
    <h5 class="modal-title" id="modalProdutosLabel">🔍 Buscar Produto no Estoque</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
</div>
<div class="modal-body">
    <form method="post" action="/pdv/adicionarItem">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?= $produto['codigo'] ?></td>
                        <td><?= $produto['nome'] ?></td>
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td><?= $produto['estoque'] ?></td>
                        <td>
                            <form method="post" action="/pdv/adicionarItem">
                                <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                                <input type="number" name="quantidade" value="1" min="1" max="<?= $produto['estoque'] ?>"
                                    style="width: 70px;">
                                <button type="submit" class="btn btn-success btn-sm">Adicionar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>