<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Services\BookService;

class BookController extends Controller
{
    protected BookService $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();
        return view("books.index", compact("books"));
    }

    public function create()
    {
        $authors = $this->bookService->getAuthors();
        $subjects = $this->bookService->getSubjects();
        return view("books.create", compact("authors", "subjects"));
    }

    public function store(StoreRequest $request)
    {
        $this->bookService->create($request->validated());
        return redirect()->route('books.index')->with('success', 'Cadastro realizado com sucesso.');
    }

    public function show($id)
    {
        $book = $this->bookService->findById($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = $this->bookService->findById($id);
        $authors = $this->bookService->getAuthors();
        $subjects = $this->bookService->getSubjects();
        return view('books.edit', compact("book", "authors", "subjects"));
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->bookService->update($id, $request->validated());
        return redirect()->route('books.index')->with('success', 'Atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $this->bookService->delete($id);
        return redirect()->route('books.index')->with('success', 'Deletado com sucesso.');
    }
}
