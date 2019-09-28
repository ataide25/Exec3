<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreInstituicaoRequest;
use App\Http\Requests\UpdateInstituicaoRequest;

class InstituicaoController extends Controller
{

    public function index()
    {
        $instituicoes = \App\Instituicao::get();

        return view('admin.instituicao.index', compact('instituicoes'));
    }

    public function form($id = null)
    {
        return view('admin.instituicao.form', ['instituicao' => \App\Instituicao::find($id)]);
    }

    public function create(StoreInstituicaoRequest $request)
    {
        $inst = new \App\Instituicao($request->all());

        $inst->status = $inst->status ?? 0;
        $inst->save();

        return redirect()->route('admin.instituicao.index');
      
    }
    public function update(UpdateInstituicaoRequest $request, int $id)
    {
        $inst = \App\Instituicao::findOrFail($id);

        $inst->name = $request->name ?? $inst->name;
        $inst->cnpj = $request->cnpj ?? $inst->cnpj;
        $inst->status = $request->status ?? 0;
   
        $inst->save();

        return redirect()->route('admin.instituicao.index');
        
    }
    public function delete(int $id)
    {
        $inst = \App\Instituicao::findOrFail($id);
        
        if($inst->canDelete()){
            $inst->delete();
        }
        
        return redirect()->route('admin.instituicao.index');
    }

    public function destroy(Request $request)
    {
        $insts = \App\Instituicao::whereIn('id',$request->ids)->get();
        
        if($insts->isEmpty()){
            return response()->json('Selecione ao menos uma instituicao', '422');
        }

        $insts->each(function($inst){
            if($inst->canDelete()){
                $inst->delete();
            }
        });
        return response()->json('Removidos!', '200');
    }

}
