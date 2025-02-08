<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController
{
    public function api_index()
    {
        $authors = Author::all();
        return (\view('AuthorView', ['authors' => $authors]));
    }

}
