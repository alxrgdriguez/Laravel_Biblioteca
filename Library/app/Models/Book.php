<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    // \database\factories\BookFactory
    use HasFactory;
    protected $fillable = [
        'title',
        'isbn',
        'cover',
        'year_publication',
        'status',
        'author_id',
        'ubication_id',
    ];

    /**
     * Un libro pertenece a un único autor
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Un libro está ubicado en una única ubicación
     */
    public function ubication(): BelongsTo
    {
        return $this->belongsTo(Ubication::class);
    }
}
