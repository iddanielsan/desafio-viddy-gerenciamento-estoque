<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';
    protected $primaryKey = 'fornecedor_id';

    protected $fillable = [
        'fornecedor_nome',
        'fornecedor_cnpj',
        'fornecedor_numero_contrato',
        'fornecedor_id'
    ];
}
