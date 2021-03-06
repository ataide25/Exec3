@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{route('admin.aluno.form')}}">
                Cadastrar Aluno
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
       
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>    
                        <th>Cpf</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Cidade / UF</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alunos as $aluno)
                        <tr data-entry-id="{{ $aluno->id }}">
                        <td>{{$aluno->id ?? ''}}</td>   
                        <td>{{$aluno->name ?? ''}}</td>   
                        <td>{{$aluno->cpf ?? ''}}</td>   
                        <td>{{$aluno->email ?? ''}}</td>   
                        <td>{{$aluno->phone ?? ''}}</td>   
                        <td>
                        {{implode('/', [$aluno->street , 'Nr: '. $aluno->number, $aluno->neighborhood])}}
                        </td>   
                        <td>
                        {{implode('/', [$aluno->city , $aluno->state])}}
                        </td>   
                        <td>
                        {{ $aluno->status === 1 ? 'ativo' : 'inativo'}}
                        </td>   
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{route('admin.aluno.form', $aluno->id)}}">
                                Editar
                            </a>
                            <form action="{{route('admin.aluno.delete', $aluno->id)}}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="Remover">
                            </form>
                               
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{route('admin.aluno.destroy')}}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
 
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection