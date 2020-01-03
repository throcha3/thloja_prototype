@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Produto</h1>
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    @if(isset($product))
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

    
    @if(isset($product))
        <form id="form_cad" autocomplete="off" method="POST"  class="form" action="{{route('product.update',$product->id)}}">
            {!! method_field('PUT')!!}
    @else
        <form id="form_cad" autocomplete="off" method="POST"  class="form" action="{{route('product.store')}}">
    @endif

    {!! csrf_field() !!}

    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" readonly class="form-control" id="id" name="id" value="@if(!empty($product)){{$product->id}}@endif" placeholder="ID">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="description">Descrição</label>
          <input type="text" class="form-control" maxlength="40" id="description" name="description" value="{{$product->description ?? old('description')}}" placeholder="Descrição">
        </div>
      </div>

      <div class="col-md-5">
        <div class="form-group">
          <label for="description_2">Descrição Complementar</label>
          <input type="text" class="form-control" maxlength="40" id="description_2" name="description_2" value="{{$product->description_2 ?? old('description_2')}}" placeholder="Descrição">
        </div>
      </div>
    </div> <!-- end row1 -->

    <div class="row">
      
      <div class="col-md-3">
        <label for="subcategory_id">Subcategoria</label>
        <select id="subcategory_id" name="subcategory_id" class="form-control js-example-basic-single" required>
          <option value="">Escolha..</option>
          @if(isset($subcategories))
            @foreach($subcategories as $s)
              <option value="{{$s['id']}}" 
              @if(old('subcategories') == $s['id'])
                  selected
              @endif 
              @if(isset($product)) 
                @if($product->subcategory->id == $s['id']) 
                  selected
                @endif 
              @endif   >{{$s['description']}}  </option>
            @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-3">
        <label for="supplier">Fornecedor</label>
        <input type="text" class="form-control" id="supplier" name= "supplier" value="{{$product->supplier  ?? old('supplier')}}" placeholder="Fornecedor">
      </div>
      <div class="col-md-3">
        <label for="price">Preço</label>
        <input type="text" class="form-control" id="price" name= "price" value="{{$product->price  ?? old('price')}}" placeholder="Preço">
      </div>
      <div class="col-md-3">
        <label for="cost_price">Custo</label>
        <input type="text" class="form-control" id="cost_price" name= "cost_price" value="{{$product->cost_price  ?? old('cost_price')}}" placeholder="Custo">
      </div>
    </div><!-- end row2 -->

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
	   $("#price").mask("00.000,00", {reverse: true ,placeholder: "0,00"});
	   $("#cost_price").mask("00.000,00", {reverse: true,placeholder: "0,00"});
     
	});
</script> 

@endsection
