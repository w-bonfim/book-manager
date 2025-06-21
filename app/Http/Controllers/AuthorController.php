<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    protected AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $authors = $this->authorService->getAll();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authorService->create($request->validated());
        return redirect()->route('authors.index')->with('success', 'Cadastro realizado com sucesso.');
    }

    public function edit($id)
    {
        $author = $this->authorService->find($id);
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->authorService->update($id, $request->validated());
        return redirect()->route('authors.index')->with('success', 'Atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $this->authorService->delete($id);
        return redirect()->route('authors.index')->with('success', 'Deletado com sucesso.');
    }
}
