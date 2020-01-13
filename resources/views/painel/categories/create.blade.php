@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Categoria</h1>
@endsection
@section('content')


<div class="row">
  <div class="col-md-12">
    @if(isset($category))
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



    @if(isset($category))
        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('category.update',$category->id)}}">
            {!! method_field('PUT')!!}
    @else
        <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('category.store')}}">
    @endif



        {!! csrf_field() !!}

            <div class="box-body">
                    <br /><br />

                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">ID:</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" id="id" name="id"  value="@if(!empty($category)){{ $category->id}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Descrição:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Digite o nome do category.." value="@if(!empty($category)){{ $category->description}}@endif">
                    </div>
                </div>




            <!-------------------------->
            <!------------- subcategories TABLE!!!! -------->
            <br />
                    <br />
                    <hr>

          <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Subcategorias</h3>
                        @if(isset($category))
                            <a href='{{url("category/$category->id/sub_create")}}' class="btn btn-info btn-xs">Adicionar SubCategoria  </a>
                        @endif
                    </div>

                <div class="box-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Descricao</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($subcategories))
                      @forelse ($subcategories as $i)
                    <tr>
                        <td>{{$i->description}}</td>
                        <td>
                            <a href='{{url("vendedor/$category->id/$i->id/item_del")}}' class="actions delete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                      <tr>
                        <td colspan="7">Nenhuma zona encontrada</td>
                      </tr>
                    @endforelse
                  @endif
                  </tbody>
                </table>
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
