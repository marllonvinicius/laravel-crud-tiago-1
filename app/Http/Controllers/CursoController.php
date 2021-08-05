<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $cursos = Curso::paginate(20);

        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }

    public function destroy(Request $request, $curso_id)
    {
        $curso = Curso::where('id', $curso_id)->first();

        if(!$curso)
            return redirect()->route('cursos.index')->with('error', 'Curso não encontrado');

        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso deletado com sucesso');
    }

    public function edit(Request $request, $curso_id)
    {
        $curso = Curso::where('id', $curso_id)->first();

        if(!$curso)
            return redirect()->route('cursos.index')->with('error', 'Curso não encontrado');

        return view('cursos.edit', [
            'curso' => $curso,
        ]);
    }

    public function update(Request $request, $curso_id)
    {
        $request->validate([
            'nome' => 'required|min:3|max:100|string',
        ]);

        $curso = Curso::where('id', $curso_id)->first();

        if(!$curso)
            return redirect()->route('cursos.index')->with('error', 'Curso não encontrado');

        $curso->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso');
    }
}
