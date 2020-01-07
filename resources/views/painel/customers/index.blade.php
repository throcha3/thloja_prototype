@extends('painel.adminlte.table_base')
@section('titulo_h1')
	<h1>Clientes</h1>
@endsection
@section('table_body')

<a href="{{route('customer.create')}}" class="btn btn-primary">Novo Cadastro</a>
<table id="tblfuncoes" name="tblCategories" class="table table-bordered table-striped">
	<thead>
		<tr>
            <th>Nome</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($customers as $v)
        <tr>
            <td>
                {{$v->first_name}}
            </td>

            <td>
                <a href='{{url("customer/{$v->id}/edit")}}' class="actions edit">
                    <i class="fa fa-edit"></i>
                </a>
                <a href='{{route("customer.show", $v->id)}}' class="actions delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
	</tbody>
</table>
<br />
<p>Clientes cadastrados: {{$total ?? ''}}.</p>

@endsection
