@extends('painel.adminlte.table_base')
@section('titulo_h1')
	<h1>PaymentMethods</h1>
@endsection
@section('table_body')

<a href="{{route('paymentmethod.create')}}" class="btn btn-primary">Novo Cadastro</a>
<table id="tblfuncoes" name="tblPaymentMethods" class="table table-bordered table-striped">
	<thead>
		<tr>
            <th>Nome</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($PaymentMethods as $v)
        <tr>
            <td>
                {{$v->description}}
            </td>

            <td>
                <a href='{{url("paymentmethod/{$v->id}/edit")}}' class="actions edit">
                    <i class="fa fa-edit"></i>
                </a>
                <a href='{{route("paymentmethod.show", $v->id)}}' class="actions delete">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
	</tbody>
</table>
<br />
<p>PaymentMethods cadastrados: {{$total ?? ''}} de 5 .</p>

@endsection
