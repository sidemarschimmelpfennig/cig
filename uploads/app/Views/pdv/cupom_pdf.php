<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cupom Fiscal</title>
    <style>
        * {
            font-family: monospace;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        body {
            max-width: 80mm;
            /* Força largura da bobina */
            margin: 0 auto;
            padding: 6px;
        }

        h2,
        h3,
        p {
            text-align: center;
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        table,
        img {
            max-width: 100%;
            word-wrap: break-word;
        }

        th,
        td {
            padding: 2px 0;
            text-align: left;
            font-size: 12px;
        }

        th {
            border-bottom: 1px dashed #000;
        }

        .totais {
            margin-top: 8px;
        }

        .linha {
            border-bottom: 1px dashed #000;
            margin: 5px 0;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>LOJA EXEMPLO</h2>
    <p>CNPJ: 00.000.000/0001-00</p>
    <p>Endereço Exemplo, 123 - Centro</p>
    <p>Tel: (11) 99999-9999</p>
    <div class="linha"></div>
    <h3>CUPOM NÃO FISCAL</h3>
    <div class="linha"></div>

    <table>
        <thead>
            <tr>
                <th>ITEM</th>
                <th>QTD</th>
                <th>R$ UNIT</th>
                <th class="right">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalGeral = 0;
            foreach ($itens as $i => $item):
                $totalItem = $item['preco_unitario'] * $item['quantidade'];
                $totalGeral += $totalItem;
                ?>
                <tr>
                    <td><?= esc($item['produto_id']) ?></td>
                    <td><?= $item['quantidade'] ?></td>
                    <td>R$ <?= number_format($item['preco_unitario'], 2, ',', '.') ?></td>
                    <td class="right">R$ <?= number_format($totalItem, 2, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="linha"></div>
    <table class="totais">
        <tr>
            <td class="bold">Subtotal:</td>
            <td class="right">R$ <?= number_format($venda['total'], 2, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="bold">Forma de Pagamento:</td>
            <td class="right"><?= esc($venda['forma_pagamento']) ?></td>
        </tr>
        <tr>
            <td class="bold">Valor Recebido:</td>
            <td class="right">R$ <?= number_format($venda['valor_recebido'], 2, ',', '.') ?></td>
        </tr>
        <tr>
            <td class="bold">Troco:</td>
            <td class="right">R$ <?= number_format($venda['troco'], 2, ',', '.') ?></td>
        </tr>
    </table>

    <div class="linha"></div>
    <p class="footer">Obrigado pela preferência!</p>
    <p class="footer">Volte sempre! 😊</p>
</body>

</html>