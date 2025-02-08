<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController
{
    public function api_index()
    {
        return AuthorResource::collection(Author::paginate(6));
    }

}
