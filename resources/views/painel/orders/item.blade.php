@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('order.index')}}">Pedidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
    <li class="breadcrumb-item active" aria-current="page">Inclusão de Item</li>
  </ol>
</nav>
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    @if(isset($order))
    <div class="box box-solid box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Inclusão de Item</h3>
      </div>
    @else
    <div class="box box-solid box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Inclusão</h3>
        </div>
    @endif

      <div class="box-body">

  
    <form id="form_cad" autocomplete="off" method="POST"  class="form" action="{{route('order.item_store')}}">

    {!! csrf_field() !!}


    <div class="row">
    <div class="col-md-6">
        <label for="product_id">Produto</label>
        <select id="product_id"  onchange="getPrice()" name="product_id" class="form-control js-example-basic-single" required>
          <option value="">Escolha..</option>
          @if(isset($products))
            @foreach($products as $y)
              <option value="{{$y['id']}}" 
              @if(old('products') == $y['id'])
                  selected
              @endif  
             >{{$y['id']}} - {{$y['description']}} - {{ 'R$ ' . number_format($y['price'], 2, ',', '.') }}</option>
            @endforeach
          @endif
        </select>
      </div>

      <script type="text/javascript">
        
            function getPrice() {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              var e = document.getElementById("product_id");
              var strUser = e.options[e.selectedIndex].value;
                $.ajax({
                    type: "GET",
                    url: "http://192.168.33.10/laravel/thloja/public/product/price/"+strUser,
                    success: function(data) {
                      $('#price').val(data);
                      $('#total_price').val(data);
                      $('#amount').val("1");
                    },
                    error: function(xhr, status, error){
                      alert(error);
                    },
                    dataType: 'text'
                });
            }
        
        </script>



      <div class="col-md-2">
        <div class="form-group">
          <label for="amount">Qtde</label>
          <input type="number" class="form-control" maxlength="40" id="amount" name="amount" value="" placeholder="Qtde">
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="price">Valor</label>
          <input type="text" class="form-control" maxlength="40" id="price" name="price" value="" placeholder="Unitário">
        </div>
      </div>

     


      <div class="col-md-2">
        <div class="form-group">
          <label for="total_price">Total</label>
          <input type="text" class="form-control" maxlength="40" id="total_price" name="total_price" value="" placeholder="Total">
        </div>
      </div>
      
    </div> <!-- end row1 -->

    <!-- <div class="ln_solid"></div> -->
    @include('painel.includes.form_buttons_default')

    <div class="row">
      <div class="col-md-12">
        <hr>
      </div> 
    </div>
    
    <br />

    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="id">ID</label>
          <input type="text" readonly class="form-control" id="id" name="id" value="@if(!empty($order)){{$order->id}}@endif" placeholder="ID">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label for="order_date">Data</label>
          <input type="date" readonly class="form-control" maxlength="40" id="order_date" name="order_date" value="{{$order->order_date ?? old('order_date')}}" placeholder="Descrição">
        </div>
      </div>

      <div class="col-md-6">
        <label for="customer_id">Cliente</label>
        <select id="customer_id" readonly name="customer_id" class="form-control js-example-basic-single" required>
          <option value="">Escolha..</option>
          @if(isset($customers))
            @foreach($customers as $s)
              <option value="{{$s['id']}}" 
              @if(old('customers') == $s['id'])
                  selected
              @endif  
              @if(isset($order)) 
                @if($order->customer_id == $s['id']) 
                  selected
                @endif 
              @endif   >{{$s['first_name']}} {{$s['last_name']}}  </option>
            @endforeach
          @endif
        </select>
      </div>

      
    </div> <!-- end row1 -->

    <div class="row">

    <div class="col-md-5">
        <label for="payment_id">Forma de Pagamento</label>
        <select id="payment_id" readonly name="payment_id" class="form-control js-example-basic-single" required>
          <option value="">Escolha..</option>
          @if(isset($paymentmethods))
            @foreach($paymentmethods as $u)
              <option value="{{$u['id']}}" 
              @if(old('paymentmethods') == $u['id'])
                  selected
              @endif  
              @if(isset($order)) 
                @if($order->payment_id == $u['id']) 
                  selected
                @endif 
              @endif   >{{$u['description']}} </option>
            @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-2">
        <label for="items">Qtde Itens</label>
        <input type="text" readonly class="form-control" id="items" name= "items" value="{{$order->items  ?? old('items')}}" placeholder="Preço">
      </div>

      <div class="col-md-4">
        <label for="total">Valor Total</label>
        <input type="text" readonly class="form-control" id="total" name= "total" value="{{$order->total  ?? old('total')}}" placeholder="Preço">
      </div>
      
    </div><!-- end row2 -->

    <div class="row">

      <div class="col-md-12">
        <label for="observations">Observações</label>
        <input type="text" readonly class="form-control" id="observations" name= "observations" value="{{$order->observations  ?? old('observations')}}" placeholder="Observações">
      </div>
    
    </div><!-- end row3 -->

    <!-------------------------->
    <hr>
      <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Itens do Pedido</h3>
                    @if(isset($order))
                        <a href='{{url("order/$order->id/item_create")}}' class="btn btn-info btn-xs">Adicionar Produto  </a>
                    @endif
                </div>

            <div class="box-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Produto</th>
                  <th>Qtde</th>
                  <th>Unitário</th>
                  <th>Total</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($orderItems))
                  @forelse ($orderItems as $i)
                <tr>
                    <td>{{$i->item}}</td>
                    <td>{{$i->product->description}}</td>
                    <td>{{$i->amount}}</td>
                    <td>{{ 'R$ ' . number_format($i->price, 2, ',', '.') }}</td>
                    <td>{{ 'R$ ' . number_format($i->total_price, 2, ',', '.') }}</td>
                    <td>
                        <a href='{{url("order/$order->id/$i->id/item_del")}}' class="actions delete">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                  <tr>
                    <td colspan="7">Nenhum item encontrado</td>
                  </tr>
                @endforelse
              @endif
              </tbody>
            </table>
          </div>
        </div>



            <!-------------------------->
            
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
	  $("#total_price").mask("00.000,00", {reverse: true,placeholder: "0,00"});
     
	});
</script> 

@endsection
