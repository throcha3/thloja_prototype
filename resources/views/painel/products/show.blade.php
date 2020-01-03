@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Product</h1>
@endsection
@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="box box-solid box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Deseja realmente excluir este Product?</h3>
      </div>

        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('product.destroy', $product->id)}}">

        {!! csrf_field() !!}
        {!! method_field('DELETE')!!}
        <div class="box-body">
            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Descrição:</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="description" name="description" value="@if(!empty($product)){{ $product->description}} @endif">
                </div>
            </div>
        </div> <!-- /.box-body -->
        <br />

        <div class="box-footer">
            <div class="form-group"><!-- form group-->
                <div class="col-md-12 col-sm-12 col-xs-12" align="right">
                    <button type="submit" class="btn btn-success">Excluir</button>
                    <a href="{{ URL::previous() }}"><button class="btn btn-danger" type="button">Cancelar</button></a>
                </div>
            </div><!--end form group-->
        </div>
    </form>

    </div>

    </div> <!-- acho q é o fim do box -->


</div>
@endsection
