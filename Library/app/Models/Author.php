<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model

{
    // \database\factories\AuthorFactory
    use HasFactory;
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
