<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'nacionalidad'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
