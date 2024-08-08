<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaProfissional extends Model
{
    use HasFactory;

    protected $table = 'experiencia_profissional';
    protected $fillable = [
        'curriculo_id',
        'empresa',
        'data_inicio',
        'data_fim',
        'emprego_atual',
        'localizacao',
        'tipo',
        'descricao',
    ];

    public function curriculo()
    {
        return $this->belongsTo(Curriculo::class);
    }}
