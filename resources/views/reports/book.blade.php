@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Relatório de Livros</h1>
    <a href="{{ route('reports.books.export') }}" class="btn btn-success mb-3">Exportar Excel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autores</th>
                <th>Assuntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->livro }}</td>
                <td>{{ $book->autores }}</td>
                <td>{{ $book->assuntos }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
