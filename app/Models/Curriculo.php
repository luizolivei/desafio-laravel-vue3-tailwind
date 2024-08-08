<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
