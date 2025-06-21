@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Editar Autor</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $author->name) }}">
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
