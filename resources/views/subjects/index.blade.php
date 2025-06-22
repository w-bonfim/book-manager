@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Assuntos</h3>
        <a href="{{ route('subjects.create') }}" class="btn btn-primary">+ Novo Assunto</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($subjects->count())
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->description }}</td>
                        <td class="text-end">
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Tem certeza de que deseja excluir esse assunto?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $subjects->links() }} <!-- Paginação -->
    @else
        <div class="alert alert-info">No subjects found.</div>
    @endif
</div>
@endsection
