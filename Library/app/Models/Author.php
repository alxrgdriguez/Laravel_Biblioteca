<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model

{
    // \database\factories\AuthorFactory
    use HasFactory;

    //La propiedad $fillable es un array que especifica
    // qué columnas de la base de datos pueden ser asignadas masivamente
    protected $fillable = [
        'name',
        'nationality',
        'date_of_birth',
        'biography',
        'dewey_code',
    ];

    // Un Autor puede tener muchos libros
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
