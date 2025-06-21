@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Cadastrar Autor</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
