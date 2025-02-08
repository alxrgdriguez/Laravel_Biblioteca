<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ubication extends Model
{
    // \database\factories\UbicationFactory
    use HasFactory;
    protected $fillable = [
        'library_name',
        'address',
        'num_shelves',
    ];

    /**
     * Una ubicación puede contener varios libros
     */
    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }
}
