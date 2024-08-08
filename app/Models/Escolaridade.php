<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    use HasFactory;

    protected $table = 'escolaridade';
    protected $fillable = [
        'curriculo_id',
        'escola',
        'tipo',
        'periodo_inicio',
        'periodo_fim',
        'estudando_atualmente',
        'local',
        'descricao',
    ];

    public function curriculo()
    {
        return $this->belongsTo(Curriculo::class);
    }}
