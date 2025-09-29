<?php

namespace App\Models;

use CodeIgniter\Model;

class VendaModel extends Model
{
    protected $table = 'vendas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['total', 'forma_pagamento', 'valor_recebido', 'troco', 'criado_em'];
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'criado_em';
    protected $updatedField = '';
}
