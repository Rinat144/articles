<?php

namespace App\Http\Controllers;


use App\Http\Resources\AuthorResource;
use App\Models\Article;
use App\Models\Author;


class AuthorController extends Controller
{
    public function all()
    {
        $author = Author::paginate(5);
        return AuthorResource::collection($author);
    }

    public function search(string $name): AuthorResource
    {
        $author = Author::where('name', $name)->first();
        return new AuthorResource($author);
    }

    public function author(Author $id)
    {
        return new AuthorResource($id);

    }

    public function delete($id): void
    {
        Author::destroy($id);
    }
}
