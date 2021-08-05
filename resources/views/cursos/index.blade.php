@extends('layouts.app')

@section('content')

<div class="w-100 my-2">
    <h1>Navbar example</h1>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Curso</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cursos as $curso)
        <tr>
            <th scope="row">{{ $curso->id }}</th>
            <td>{{ $curso->nome }}</td>
            <td>
                <a href="{{ route('cursos.destroy', $curso->id) }}"
                    onclick="if (! confirm('Deseja mesmo deletar o curso {{ $curso->nome }}?')) { return false; }"
                    class="btn btn-sm btn-danger">Excluir</a>
                <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-info">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                {{ $cursos->links('pagination::bootstrap-4') }}
            </td>
        </tr>
    </tfoot>
</table>
@endsection
