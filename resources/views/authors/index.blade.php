@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Autores</h3>
        <a href="{{ route('authors.create') }}" class="btn btn-primary">+ Novo Autor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($authors->count())
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza de que deseja excluir esse autor?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $authors->links() }}
    @else
        <div class="alert alert-info">No authors found.</div>
    @endif
</div>
@endsection
