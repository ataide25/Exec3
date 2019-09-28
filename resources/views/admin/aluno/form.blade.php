@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ isset($aluno->id) ? 'Editar' : 'Cadastrar'  }} Aluno.
    </div>

    <div class="card-body">
        <form action="{{ isset($aluno->id) ? route("admin.aluno.update", $aluno->id) : route("admin.aluno.create") }}" method="POST" enctype="multipart/form-data" >
        
            @csrf

            @if(isset($aluno->id))
              @method('PUT')
              <input type='hidden' name='id' value='{{$aluno->id}}'>
            @endif
            <div class='row'>
                <div class="col-5 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nome: *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($aluno) ? $aluno->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                </div>
                <div class="col-3 form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                    <label for="name">CPF: *</label>
                    <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', isset($aluno) ? $aluno->cpf : '') }}" required>
                    @if($errors->has('cpf'))
                        <em class="invalid-feedback">
                            {{ $errors->first('cpf') }}
                        </em>
                    @endif
                </div>
                <div class="col-3 form-group {{ $errors->has('birth') ? 'has-error' : '' }}">
                    <label for="name">Dt. Nascimento: *</label>
                    <input type="date" id="birth" name="birth" class="form-control" value="{{ old('birth', isset($aluno) ? $aluno->birth : '') }}" required>
                    @if($errors->has('birth'))
                        <em class="invalid-feedback">
                            {{ $errors->first('birth') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class='row'>
                <div class="col-5 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="name">E-mail: *</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email', isset($aluno) ? $aluno->email : '') }}" required>
                    @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                    @endif
                </div>
                <div class="col-3 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="name">Telefone: *</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($aluno) ? $aluno->phone : '') }}" required>
                    @if($errors->has('phone'))
                        <em class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </em>
                    @endif
                </div>
                <div class="col-3 form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="name">Status: (Ativo ou Inativo) *</label>
                    <input type="checkbox" id="status" name="status" class="form-control" value="1" {{ old('status', isset($aluno->status) && $aluno->status ? 'checked' : '') }}>
                    @if($errors->has('status'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class='row'>
                <div class="col-5 form-group {{ $errors->has('street') ? 'has-error' : '' }}">
                    <label for="name">Rua: *</label>
                    <input type="text" id="street" name="street" class="form-control" value="{{ old('street', isset($aluno) ? $aluno->street : '') }}" required>
                    @if($errors->has('street'))
                        <em class="invalid-feedback">
                            {{ $errors->first('street') }}
                        </em>
                    @endif
                </div>
                <div class="col-3 form-group {{ $errors->has('number') ? 'has-error' : '' }}">
                    <label for="name">Numero: *</label>
                    <input type="number" id="number" name="number" class="form-control" value="{{ old('number', isset($aluno) ? $aluno->number : '') }}" required>
                    @if($errors->has('number'))
                        <em class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </em>
                    @endif
                </div>
                <div class="col-3 form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
                    <label for="name">Bairro: *</label>
                    <input type="text" id="neighborhood" name="neighborhood" class="form-control" value="{{ old('neighborhood', isset($aluno) ? $aluno->neighborhood : '') }}" required>
                    @if($errors->has('neighborhood'))
                        <em class="invalid-feedback">
                            {{ $errors->first('neighborhood') }}
                        </em>
                    @endif
                </div>
            </div>
            <div class='row'>
                <div class="col-5 form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                    <label for="name">Cidade: *</label>
                    <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($aluno) ? $aluno->city : '') }}" required>
                    @if($errors->has('city'))
                        <em class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </em>
                    @endif
                </div>
                <div class="col-2 form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                    <label for="name">UF: *</label>
                    <input type="text" id="state" name="state" class="form-control" value="{{ old('state', isset($aluno) ? $aluno->state : '') }}" length='2' required>
                    @if($errors->has('state'))
                        <em class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </em>
                    @endif
                </div>

                <div class="col-3 form-group {{ $errors->has('curso_id') ? 'has-error' : '' }}">
                    <label for="name">Curso: *</label>
                    <select id="curso_id" name="curso_id" class="form-control" required>
                        <option value=''>&nbsp</option>
                        @foreach($cursos as $curso)
                            <option value='{{$curso->id}}' {{ old('curso_id', isset($aluno->curso_id) && $aluno->curso_id == $curso->id ? 'selected' : '') }}>
                                {{$curso->name}}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" type="text/javascript" /></script>

<script type='text/javascript'>
    $(document).ready(function(){	
		$("#cpf").mask('000.000.000-00', {reverse: true});
        $('#phone').blur(function(event) {
            if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
                $('#phone').mask('(00) 00000-0009');
            } else {
                $('#phone').mask('(00) 0000-00009');
            }
        });
	});

</script>
@stop