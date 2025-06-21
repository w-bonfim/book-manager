@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Livros</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Novo Livro</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autores</th>
                <th>Assuntos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>
                    @foreach($book->authors as $author)
                        <span class="badge bg-secondary">{{ $author->name }}</span>
                    @endforeach
                </td>
                <td>
                    @foreach($book->subjects as $subject)
                        <span class="badge bg-secondary">{{ $subject->description }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza de que deseja excluir esse Livro?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
