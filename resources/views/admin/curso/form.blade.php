@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ isset($curso->id) ? 'Editar' : 'Cadastrar'  }} Curso.
    </div>

    <div class="card-body">
        <form action="{{ isset($curso->id) ? route("admin.curso.update", $curso->id) : route("admin.curso.create") }}" method="POST" enctype="multipart/form-data" >
        
            @csrf

            @if(isset($curso->id))
              @method('PUT')
              <input type='hidden' name='id' value='{{$curso->id}}'>
            @endif
            <div class='row'>
                <div class="col-5 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome: *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($curso) ? $curso->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                </div>
                <div class="col-4 form-group {{ $errors->has('closure') ? 'has-error' : '' }}">
                    <label for="name">Encerramento: *</label>
                    <input type="date" id="closure" name="closure" class="form-control" value="{{ old('closure', isset($curso) ? $curso->closure : '') }}" required>
                    @if($errors->has('closure'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cnpj') }}
                        </em>
                    @endif
                </div>
                 <div class="col-3 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="name">Status: (Ativo ou Inativo) *</label>
                    <input type="checkbox" id="status" name="status" class="form-control" value="1" {{ old('status', isset($curso->status) && $curso->status ? 'checked' : '') }}>
                    @if($errors->has('status'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class='row'>
            <div class="col-3 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="name">Instituição</label>
                <select id="instituicao_id" name="instituicao_id" class="form-control" >
                    @foreach($instituicoes as $instituicao)
                        <option value='{{$instituicao->id}}' {{ old('instituicao_id', isset($curso->instituicao_id) && $curso->instituicao_id == $instituicao->id ? 'selected' : '') }}>
                            {{$instituicao->name}}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('instituicao_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('instituicao_id') }}
                    </em>
                @endif
            </div>
            </div>
            

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
@stop