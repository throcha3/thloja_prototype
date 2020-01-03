@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>PaymentMethod</h1>
@endsection
@section('content')


<div class="row">
  <div class="col-md-12">
    @if(isset($paymentmethod))
    <div class="box box-solid box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Edição</h3>
      </div>
    @else
    <div class="box box-solid box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Inclusão</h3>
        </div>
    @endif



    @if(isset($paymentmethod))
        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('paymentmethod.update',$paymentmethod->id)}}">
            {!! method_field('PUT')!!}
    @else
        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('paymentmethod.store')}}">
    @endif



        {!! csrf_field() !!}

            <div class="box-body">
                    @if(isset($paymentmethod))
                        @if($paymentmethod->status == '1')
                            <a href='{{route('paymentmethod.disablehim', $paymentmethod->id)}}' class="btn btn-danger">Desativar PaymentMethod  </a>
                        @endif
                    @endif

                    <br /><br />

                    <div class="form-group">
                        <label for="id" class="col-sm-2 control-label">ID:</label>
                        <div class="col-sm-8">
                        <input type="text" readonly class="form-control" id="id" name="id"  value="@if(!empty($paymentmethod)){{ $paymentmethod->id}} @endif">
                        </div>
                    </div>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Descrição:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Digite o nome do paymentmethod.." value="@if(!empty($paymentmethod)){{ $paymentmethod->description}} @endif">
                    </div>
                </div>




            <!-------------------------->
            <br />


            </div> <!-- /.box-body -->
            <br />

            <div class="box-footer">
                @include('painel.includes.form_buttons_default')
            </div>
        </form>

      </div>

    </div> <!-- acho q é o fim do box -->


</div>



@endsection
