@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ isset($instituicao->id) ? 'Editar' : 'Cadastrar'  }} Instituição.
    </div>

    <div class="card-body">
        <form action="{{ isset($instituicao->id) ? route("admin.instituicao.update", $instituicao->id) : route("admin.instituicao.create") }}" method="POST" enctype="multipart/form-data" >
        
            @csrf

            @if(isset($instituicao->id))
              @method('PUT')
              <input type='hidden' name='id' value='{{$instituicao->id}}'>
            @endif
            <div class='row'>
                <div class="col-5 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome: *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($instituicao) ? $instituicao->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                </div>
                <div class="col-4 form-group {{ $errors->has('cnpj') ? 'has-error' : '' }}">
                    <label for="name">CNPJ: *</label>
                    <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{ old('cnpj', isset($instituicao) ? $instituicao->cnpj : '') }}" required>
                    @if($errors->has('cnpj'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cnpj') }}
                        </em>
                    @endif
                </div>
                 <div class="col-3 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="name">Status: (Ativo ou Inativo) *</label>
                    <input type="checkbox" id="status" name="status" class="form-control" value="1" {{ old('status', isset($instituicao->status) && $instituicao->status ? 'checked' : '') }}>
                    @if($errors->has('status'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" type="text/javascript" /></script>

<script type='text/javascript'>
    $(document).ready(function(){	
		$("#cnpj").mask("99.999.999/9999-99");
	});
</script>
@stop