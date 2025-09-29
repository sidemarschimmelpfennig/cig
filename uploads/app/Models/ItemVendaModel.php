<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemVendaModel extends Model
{
    protected $table = 'itens_venda';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venda_id', 'produto_id', 'quantidade', 'preco_unitario', 'subtotal'];
    protected $returnType = 'array';
}
