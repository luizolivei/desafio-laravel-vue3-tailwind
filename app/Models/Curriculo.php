<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'cpf',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'pretencao_salarial',
    ];

    public function experienciasProfissionais()
    {
        return $this->hasMany(ExperienciaProfissional::class);
    }

    public function escolaridades()
    {
        return $this->hasMany(Escolaridade::class);
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
