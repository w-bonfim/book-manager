@extends('layouts.app')

@section( 'styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section( 'content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Cadastrar novo livro</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mx-auto" style="max-width: 500px;">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Título:</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Editora:</label>
                <input type="text" name="publisher" value="{{ old('publisher') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Edição:</label>
                <input type="number" name="edition" value="{{ old('edition') }}" class="form-control w-auto" min="1">
            </div>

            <div class="mb-3">
                <label class="form-label">Ano de Publicação:</label>
                <input type="text" name="published_year" value="{{ old('published_year') }}" class="form-control w-auto" maxlength="4">
            </div>

            <div class="mb-3">
                <label class="form-label">Valor (R$):</label>
                <input type="number" step="0.01" name="value" value="{{ old('value') }}" class="form-control w-auto">
            </div>

            <div class="mb-3">
                <label class="form-label">Autores:</label>
                <select name="authors[]" class="form-control" id="authors-select" multiple>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Assuntos:</label>
                <select name="subjects[]" class="form-control" id="subjects-select" multiple>
                    <option value="">Selecione...</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->description }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

@section( 'scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#authors-select').select2({
            placeholder: 'Selecione os autores',
            width: '100%'
        })

        $('#subjects-select').select2({
            placeholder: 'Selecione os assuntos',
            width: '100%'
        })
    })
</script>
@endsection
