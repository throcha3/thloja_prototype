@extends('painel.adminlte.table_base')
@section('titulo_h1')
	<h1>Pedidos</h1>
@endsection
@section('table_body')

<a href="{{route('order.create')}}" class="btn btn-primary">Novo Cadastro</a>
<table id="tblfuncoes" name="tblCategories" class="table table-bordered table-striped">
	<thead>
		<tr>
            <th>Nome</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($orders as $v)
        <tr>
            <td>
                {{$v->customer_id}}
            </td>

            <td>
                <a href='{{url("order/{$v->id}/edit")}}' class="actions edit">
                    <i class="fa fa-edit"></i>
                </a>
                <a href='{{route("order.show", $v->id)}}' class="actions delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
	</tbody>
</table>
<br />
<p>Pedidos cadastrados: {{$total ?? ''}}.</p>

@endsection
