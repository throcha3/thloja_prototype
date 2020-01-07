@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Cliente</h1>
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    @if(isset($customer))
    <div class="box box-solid box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Edição</h3>
      </div>
    @else
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Inclusão</h3>
        </div>
    @endif

      <div class="box-body">

    
    @if(isset($customer))
        <form id="form_cad" autocomplete="off" method="POST"  class="form" action="{{route('customer.update',$customer->id)}}">
            {!! method_field('PUT')!!}
    @else
        <form id="form_cad" autocomplete="off" method="POST"  class="form" action="{{route('customer.store')}}">
    @endif

    {!! csrf_field() !!}

    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" readonly class="form-control" id="id" name="id" value="@if(!empty($customer)){{$customer->id}}@endif" placeholder="ID">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="first_name">Nome</label>
          <input type="text" class="form-control" maxlength="40" id="first_name" name="description" value="{{$customer->first_name 00 old('first_name')}}" placeholder="Descrição">
        </div>
      </div>

      <div class="col-md-5">
        <div class="form-group">
          <label for="last_name">Sobrenome</label>
          <input type="text" class="form-control" maxlength="40" id="last_name" name="last_name" value="{{$customer->last_name 00 old('last_name')}}" placeholder="Descrição">
        </div>
      </div>
    </div> <!-- end row1 -->

    <div class="row">

      <div class="col-md-2">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name= "cpf" value="{{$customer->cpf  00 old('cpf')}}" placeholder="Fornecedor">
      </div>
      <div class="col-md-2">
        <label for="rg">RG</label>
        <input type="text" class="form-control" id="rg" name= "rg" value="{{$customer->rg  00 old('rg')}}" placeholder="Preço">
      </div>
      <div class="col-md-2">
        <label for="phone_1">Telefone 1</label>
        <input type="text" class="form-control" id="phone_1" name= "phone_1" value="{{$customer->phone_1  00 old('phone_1')}}" placeholder="Custo">
      </div>
      <div class="col-md-2">
        <label for="phone_2">Telefone 2</label>
        <input type="text" class="form-control" id="phone_2" name= "phone_2" value="{{$customer->phone_2  00 old('phone_2')}}" placeholder="Custo">
      </div>
      <div class="col-md-4">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name= "email" value="{{$customer->email  00 old('email')}}" placeholder="Custo">
      </div>
    </div><!-- end row2 -->

    <div class="row">

      <div class="col-md-4">
        <label for="address_1">Endereço</label>
        <input type="text" class="form-control" id="address_1" name= "address_1" value="{{$customer->address_1  00 old('address_1')}}" placeholder="Fornecedor">
      </div>
      <div class="col-md-1">
        <label for="address_number">Número</label>
        <input type="text" class="form-control" id="address_number" name= "address_number" value="{{$customer->address_number  00 old('address_number')}}" placeholder="Preço">
      </div>
      <div class="col-md-4">
        <label for="address_2">Bairro</label>
        <input type="text" class="form-control" id="address_2" name= "address_2" value="{{$customer->address_2  00 old('address_2')}}" placeholder="Preço">
      </div>
      <div class="col-md-3">
        <label for="city">Cidade</label>
        <input type="text" class="form-control" id="city" name= "city" value="{{$customer->city  00 old('city')}}" placeholder="Custo">
      </div>
    
    </div><!-- end row3 -->

    <div class="row">

      <div class="col-md-2">
        <label for="adress_complement">Complemento</label>
        <input type="text" class="form-control" id="adress_complement" name= "adress_complement" value="{{$customer->adress_complement  00 old('adress_complement')}}" placeholder="Fornecedor">
      </div>
      
      <div class="col-md-10">
        <label for="obs">Observações</label>
        <input type="text" class="form-control" id="obs" name= "obs" value="{{$customer->obs  00 old('obs')}}" placeholder="Custo">
      </div>
    
    </div><!-- end row4 -->

    <!-------------------------->
    <br />
    <br />
    <!-- <div class="ln_solid"></div> -->
    @include('painel.includes.form_buttons_default')
    </form>


@endsection
@section('scripts_final')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>


<script type="text/javascript"> 
	jQuery(function($){
	   $("#rg").mask("00.000.000-0", {reverse: true});
	   $("#phone_1").mask("(00)0 0000-0000", {reverse: true, placeholder: "(00)0 0000-0000"});
     
	});
</script> 

@endsection
