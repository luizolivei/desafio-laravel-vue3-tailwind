<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculo_id',
        'nome',
        'local',
        'carga_horaria',
        'descricao',
    ];

    public function curriculo()
    {
        return $this->belongsTo(Curriculo::class);
    }}
