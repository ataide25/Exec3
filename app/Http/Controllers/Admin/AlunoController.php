<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;

class AlunoController extends Controller
{

    public function index()
    {
        $alunos = \App\Aluno::get();
      
        return view('admin.aluno.index', compact('alunos'));
    }

    public function form($id = null)
    {
        $cursos = \App\Curso::where('status', 1)->get();
        return view('admin.aluno.form', ['aluno' => \App\Aluno::find($id), 'cursos' => $cursos]);
    }

    public function create(StoreAlunoRequest $request)
    {
        $aluno = new \App\Aluno($request->all());
        
        $aluno->status = $request->status ?? 0;

        $aluno->save();
        
        return redirect()->route('admin.aluno.index');
      
    }
    public function update(UpdateAlunoRequest $request, int $id)
    {
        
        $aluno = \App\Aluno::findOrFail($id);
        
        $aluno->name = $request->name ?? $aluno->name; 
        $aluno->curso_id = $request->curso_id ?? $aluno->curso_id; 
        $aluno->cpf = $request->cpf ?? $aluno->cpf; 
        $aluno->birth = $request->birth ?? $aluno->birth; 
        $aluno->email = $request->email ?? $aluno->email; 
        $aluno->phone = $request->phone ?? $aluno->phone; 
        $aluno->street = $request->street ?? $aluno->street; 
        $aluno->number = $request->number ?? $aluno->number; 
        $aluno->neighborhood = $request->neighborhood ?? $aluno->neighborhood; 
        $aluno->city = $request->city ?? $aluno->city; 
        $aluno->state = $request->state ?? $aluno->state; 
        $aluno->status = $request->status ?? 0;
        $aluno->save();

        return redirect()->route('admin.aluno.index');
        
    }
    public function delete(int $id)
    {
        $al = \App\Aluno::findOrFail($id);
        $al->delete();
       
        return redirect()->route('admin.curso.index');
    }

    public function destroy(Request $request)
    {
        $als = \App\Aluno::whereIn('id',$request->ids)->delete();
        
        return response()->json('Removidos!', '200');
    }

}
