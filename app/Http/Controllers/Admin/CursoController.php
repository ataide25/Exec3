<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;

class CursoController extends Controller
{

    public function index()
    {
        $cursos = \App\Curso::get();

        return view('admin.curso.index', compact('cursos'));
    }

    public function form($id = null)
    {
        $instituicoes = \App\instituicao::where('status', 1)->get();
        $instituicoes->prepend(new \App\instituicao());
        return view('admin.curso.form', ['curso' => \App\Curso::find($id), 'instituicoes' => $instituicoes]);
    }

    public function create(StoreCursoRequest $request)
    {
        $cur = new \App\Curso($request->all());
        $cur->status = $cur->status ?? 0;
        
        $now = \Carbon\Carbon::now();
    
        $closure = new \Carbon\Carbon($request->closure);
        
        if($closure->lessThan($now)){
            $cur->status = 0;
        }

        $cur->save();
        
        return redirect()->route('admin.curso.index');
      
    }
    public function update(UpdateCursoRequest $request, int $id)
    {
        $cur = \App\Curso::findOrFail($id);

        $cur->name = $request->name ?? $cur->name;
        $cur->status = $request->status ?? 0;
        $cur->closure = $request->closure;
        $cur->instituicao_id = $request->instituicao_id ?? null;
        
        $cur->save();

        return redirect()->route('admin.curso.index');
        
    }
    public function delete(int $id)
    {
        $cur = \App\Curso::findOrFail($id);
        
        if($cur->canDelete()){
            $cur->delete();
        }
        
        return redirect()->route('admin.curso.index');
    }

    public function destroy(Request $request)
    {
        $curs = \App\Curso::whereIn('id',$request->ids)->get();
        
        if($curs->isEmpty()){
            return response()->json('Selecione ao menos um curso', '422');
        }

        $curs->each(function($cur){
            if($cur->canDelete()){
                $cur->delete();
            }
        });
        return response()->json('Removidos!', '200');
    }

}
