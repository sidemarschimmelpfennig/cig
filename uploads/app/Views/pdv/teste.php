<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>PDV - Frente de Caixa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            max-width: 100%;
        }

        .btn-round {
            border-radius: 20px;
        }

        .table td input {
            width: 80px;
        }

        .btn-remove {
            background: #ff4d4d;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 5px 10px;
        }

        .total {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .highlight-box {
            background: #f8f9fa;
            border-radius: 12px;
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Seção Principal (Carrinho) -->
            <div class="col-md-8">
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control w-50" placeholder="Buscar item por nome ou código...">
                    <div>
                        <button class="btn btn-primary btn-round" data-bs-toggle="modal"
                            data-bs-target="#modalProdutos">Buscar Produto</button>
                    </div>
                </div>

                <!-- Tabela de produtos no carrinho -->
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Qtd</th>
                            <th>Desconto</th>
                            <th>Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $subtotal = 0;
                        $descontos = 0;
                        $carrinho = session('carrinho') ?? [];

                        foreach ($carrinho as $index => $item):
                            $itemTotal = ($item['preco'] * $item['quantidade']) - ($item['desconto'] ?? 0);
                            $subtotal += $item['preco'] * $item['quantidade'];
                            $descontos += $item['desconto'] ?? 0;
                            ?>
                            <tr data-index="<?= $index ?>">
                                <td><?= esc($item['nome']) ?></td>
                                <td><input type="number" class="form-control preco" value="<?= $item['preco'] ?>"
                                        step="0.01"></td>
                                <td><input type="number" class="form-control qtd" value="<?= $item['quantidade'] ?>"
                                        min="1"></td>
                                <td><input type="number" class="form-control desconto" value="<?= $item['desconto'] ?? 0 ?>"
                                        step="0.01"></td>
                                <td class="linha-total text-success fw-bold">R$
                                    <?= number_format($itemTotal, 2, ',', '.') ?>
                                </td>
                                <td>
                                    <form action="<?= base_url('/pdv/removerItem/' . $index) ?>" method="post"
                                        style="display:inline;">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn-remove"
                                            title="Remover item do carrinho">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Resumo financeiro -->
            <div class="col-md-4">
                <div class="highlight-box">
                    <h5>💰 Resumo Financeiro</h5>
                    <p>Subtotal: <span class="float-end" id="subtotal">R$
                            <?= number_format($subtotal, 2, ',', '.') ?></span></p>
                    <p>Descontos: <span class="float-end text-danger" id="descontos">- R$
                            <?= number_format($descontos, 2, ',', '.') ?></span></p>
                    <p>Taxas: <span class="float-end">R$ 0,00</span></p>
                    <hr>
                    <p class="total">Total: <span class="float-end text-success" id="total">R$
                            <?= number_format($subtotal - $descontos, 2, ',', '.') ?></span></p>

                    <!-- Formulário de finalização -->
                    <form action="/pdv/finalizarVenda" method="post">
                        <?= csrf_field() ?>
                        <label>Forma de Pagamento:</label>
                        <select name="forma_pagamento" id="forma_pagamento" class="form-control mb-2" required>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão">Cartão</option>
                            <option value="PIX">PIX</option>
                        </select>

                        <label>Valor Recebido:</label>
                        <input type="number" step="0.01" name="valor_recebido" id="valorRecebido"
                            class="form-control mb-2" required>

                        <label>Troco:</label>
                        <input type="text" id="troco" class="form-control mb-3" readonly value="R$ 0,00">

                        <button class="btn btn-success w-100 btn-round" onclick="clear()">✅ Finalizar Venda</button>
                    </form>
                </div>

                <!-- Ações rápidas -->
                <div class="highlight-box mt-3">
                    <h6>⚡ Ações Rápidas</h6>
                    <button class="btn btn-primary w-100 mb-2">Marcar como Entregue</button>
                    <a href="/pdv/cancelarVenda" class="btn btn-danger w-100">Cancelar Pedido</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Produtos -->
    <div class="modal fade" id="modalProdutos" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <?= view('pdv/modal_produtos') ?>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function formatarReal(valor) {
            return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }

        function calcularTotais() {
            let subtotal = 0;
            let totalDescontos = 0;

            document.querySelectorAll('tr[data-index]').forEach(row => {
                let preco = parseFloat(row.querySelector('.preco').value) || 0;
                let qtd = parseInt(row.querySelector('.qtd').value) || 0;
                let desconto = parseFloat(row.querySelector('.desconto').value) || 0;

                let totalLinha = (preco * qtd) - desconto;
                row.querySelector('.linha-total').innerText = formatarReal(totalLinha);

                subtotal += preco * qtd;
                totalDescontos += desconto;
            });

            let totalFinal = subtotal - totalDescontos;

            document.getElementById('subtotal').innerText = formatarReal(subtotal);
            document.getElementById('descontos').innerText = '- ' + formatarReal(totalDescontos);
            document.getElementById('total').innerText = formatarReal(totalFinal);

            let recebido = parseFloat(document.getElementById('valorRecebido').value) || 0;
            let troco = recebido - totalFinal;
            document.getElementById('troco').value = troco >= 0 ? formatarReal(troco) : 'R$ 0,00';
        }

        // Eventos de mudança
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.preco, .qtd, .desconto').forEach(input => {
                input.addEventListener('input', calcularTotais);
            });

            const valorRecebido = document.getElementById('valorRecebido');
            if (valorRecebido) {
                valorRecebido.addEventListener('input', calcularTotais);
            }
        });

        function clear() {
            document.getElementById('troco').value = 'R$ 0,00';
            document.getElementById('forma_pagamento').value = 'Dinheiro'

        }




    </script>
</body>

</html>