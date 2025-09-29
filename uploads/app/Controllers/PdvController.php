<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use App\Models\VendaModel;
use App\Models\ItemVendaModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdvController extends BaseController
{
    public function index()
    {
        $produtoModel = new ProdutoModel();
        $data['produtos'] = $produtoModel->findAll();
        return view('pdv/index', $data);
    }

    public function adicionarItem()
    {
        $produtoModel = new ProdutoModel();
        $id = $this->request->getPost('produto_id');
        $quantidade = $this->request->getPost('quantidade');

        $produto = $produtoModel->find($id);

        if (!$produto) {
            return redirect()->back()->with('erro', 'Produto não encontrado');
        }

        $item = [
            'produto_id' => $produto['id'],
            'nome' => $produto['nome'],
            'quantidade' => $quantidade,
            'preco' => $produto['preco'],
            'subtotal' => $produto['preco'] * $quantidade
        ];

        $carrinho = session()->get('carrinho') ?? [];
        $carrinho[] = $item;

        session()->set('carrinho', $carrinho);

        return redirect()->to('/pdv');
    }

    public function cancelarVenda()
    {
        session()->remove('carrinho');
        return redirect()->to('/pdv')->with('sucesso', 'Venda cancelada!');
    }

    public function finalizarVenda()
    {
        $carrinho = session()->get('carrinho');

        if (!$carrinho || count($carrinho) === 0) {
            return redirect()->to('/pdv')->with('erro', 'Carrinho vazio');
        }

        $total = array_sum(array_column($carrinho, 'subtotal'));

        $vendaModel = new VendaModel();
        $itemModel = new ItemVendaModel();

        $vendaId = $vendaModel->insert([
            'total' => $total,
            'forma_pagamento' => $this->request->getPost('forma_pagamento'),
            'valor_recebido' => $this->request->getPost('valor_recebido'),
            'troco' => $this->request->getPost('valor_recebido') - $total,
        ]);

        foreach ($carrinho as $item) {
            $itemModel->insert([
                'venda_id' => $vendaId,
                'produto_id' => $item['produto_id'],
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $item['preco'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        session()->remove('carrinho');
        return redirect()->to("/pdv/gerarCupom/$vendaId");
    }



    public function gerarCupom($id)
    {
        $vendaModel = new VendaModel();
        $itemModel = new ItemVendaModel();

        $venda = $vendaModel->find($id);
        $itens = $itemModel->where('venda_id', $id)->findAll();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $html = view('pdv/cupom_pdf', ['venda' => $venda, 'itens' => $itens]);
        $dompdf->loadHtml($html);

        // 1ª renderização com altura provisória
        $dompdf->setPaper([0, 0, 226.77, 1000], 'portrait'); // 80mm x altura provisória
        $dompdf->render();

        // Obtém altura real após renderizar
        $canvas = $dompdf->getCanvas();
        $realHeight = $canvas->get_height();

        // Re-renderiza usando altura exata do conteúdo
        $dompdf->setPaper([0, 0, 226.77, $realHeight], 'portrait');
        $dompdf->render();

        return $this->response
            ->setContentType('application/pdf')
            ->setBody($dompdf->output());
    }



    public function removerItem($index)
    {
        $carrinho = session()->get('carrinho') ?? [];

        if (isset($carrinho[$index])) {
            unset($carrinho[$index]);
            session()->set('carrinho', $carrinho);
        }

        return redirect()->back()->with('success', 'Item removido do carrinho.');
    }

}
