@extends('painel.adminlte.table_base')
@section('titulo_h1')
	<h1>Pedidos</h1>
@endsection
@section('table_body')

<a href="{{route('order.create')}}" class="btn btn-primary">Novo Cadastro</a>
<br />
<table id="tblfuncoes" name="tblCategories" class="table table-bordered table-striped">
	<thead>
		<tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Itens</th>
            <th>Total</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($orders as $v)
        <tr>
            <td>
                {{$v->id}}
            </td>
            <td>
                {{$v->customer->first_name}} {{$v->customer->last_name}}
            </td>
            <td>
                {{$v->items}}
            </td>
            <td>
                {{ 'R$ ' . number_format($v->total, 2, ',', '.') }}
            </td>

            <td>
                <a href='{{url("order/{$v->id}/edit")}}' class="actions edit">
                    <i class="fa fa-edit"></i> Editar
                </a>
                <a href='{{route("order.show", $v->id)}}' class="actions delete">
                    <i class="fa fa-trash"></i> Deletar
                </a>
            </td>
        </tr>
        @endforeach
	</tbody>
</table>
<br />
<p>Pedidos cadastrados: {{$total ?? ''}}.</p>

@endsection
