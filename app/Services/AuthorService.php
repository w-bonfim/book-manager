<?php

namespace App\Services;

use App\Models\Author;
use Exception;

class AuthorService
{
    public function getAll()
    {
        return Author::orderBy('name')->paginate(10);
    }

    public function find($id)
    {
        return Author::findOrFail($id);
    }

    public function create(array $data)
    {
        return Author::create($data);
    }

    public function update($id, array $data)
    {
        $author = Author::findOrFail($id);
        $author->update($data);
        return $author;
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        return $author->delete();
    }
}
