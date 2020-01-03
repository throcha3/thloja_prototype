@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Categoria</h1>
@endsection
@section('content')


<div class="row">
  <div class="col-md-12">
    @if(isset($product))
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



    @if(isset($product))
        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('product.update',$product->id)}}">
            {!! method_field('PUT')!!}
    @else
        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('product.store')}}">
    @endif



        {!! csrf_field() !!}

            <div class="box-body">
                    <br /><br />

                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">ID:</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" id="id" name="id"  value="@if(!empty($product)){{ $product->id}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Descrição:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Digite o nome do product.." value="@if(!empty($product)){{ $product->description}} @endif">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description_2" class="col-sm-2 control-label">Descrição Complementar:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="description_2" name="description_2" placeholder="Digite o nome do product.." value="@if(!empty($product)){{ $product->description_2}} @endif">
                    </div>
                </div>

                <div class="form-group">
                    <label for="supplier" class="col-sm-2 control-label">Supplier:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="supplier" name="supplier" placeholder="Digite o nome do product.." value="@if(!empty($product)){{ $product->supplier}} @endif">
                    </div>
                </div>

                <div class="form-group">
                    <label for="photo_url" class="col-sm-2 control-label">Photo_url:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="photo_url" name="photo_url" placeholder="Digite o nome do product.." value="@if(!empty($product)){{ $product->photo_url}} @endif">
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="subcategory_id" class="col-sm-2 control-label">subcategory_id:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="subcategory_id" name="subcategory_id" placeholder="Digite o nome do product.." value="@if(!empty($product)){{ $product->subcategory_id}} @endif">
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
