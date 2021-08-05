@extends('layouts.app')

@section('content')

<div class="w-100 my-2">
    <h1>Navbar example</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('cursos.update', $curso->id) }}">
    @method('PUT')
    @csrf
    <div class="col-6 mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') ?? $curso->nome ?? null }}" placeholder="Nome do curso" required>
        @error('nome')
            <div class="alert alert-danger p-0 px-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary mb-3">Atualizar</button>
    </div>
</form>
@endsection
