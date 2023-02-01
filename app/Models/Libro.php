<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'autor', 'anio', 'pais', 'idioma'];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
