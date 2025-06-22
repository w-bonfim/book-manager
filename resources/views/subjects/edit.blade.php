@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Editar Assunto</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Descrição:</label>
            <input type="text" class="form-control" name="description" value="{{ old('description', $subject->description) }}">
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
