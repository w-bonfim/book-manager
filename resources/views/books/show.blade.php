@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalhes do Livro</h2>
    <div class="card mt-3" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text"><strong>Editora:</strong> {{ $book->publisher }}</p>
            <p class="card-text"><strong>Edição:</strong> {{ $book->edition }}</p>
            <p class="card-text"><strong>Ano de Publicação:</strong> {{ $book->published_year }}</p>
            <p class="card-text"><strong>Valor:</strong> R$ {{ number_format($book->value, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Autores:</strong>
                @foreach($book->authors as $author)
                    <span class="badge bg-secondary">{{ $author->name }}</span>
                @endforeach
            </p>
            <p class="card-text"><strong>Assunto:</strong>
                @foreach($book->subjects as $subject)
                    <span class="badge bg-secondary">{{ $subject->description }}</span>
                @endforeach
            </p>
            <a href="{{ route('books.index') }}" class="btn btn-secondary mt-2">Voltar</a>
        </div>
    </div>
</div>
@endsection
