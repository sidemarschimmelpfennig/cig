<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['codigo', 'nome', 'preco', 'estoque'];
    protected $returnType = 'array';
}
