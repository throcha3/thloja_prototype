@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Vendedor</h1>
@endsection
@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="box box-solid box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Edição</h3>
      </div>



    <form id="form_cad" method="POST"  class="form-horizontal form-label-left" action="{{route('vendedor.item_store')}}">

        {!! csrf_field() !!}
<br />
        <div class="form-group">
            <label for="token" class="col-sm-2 control-label">Zona:</label>
            <div class="col-sm-8">

            <select id="id_zona" name="id_zona" class="form-control" required>
                @foreach ($zonas as $z)
                    <option value="{{$z->id}}" >{{$z->id . '- '. $z->nome}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <input type="hidden" name="id_vendedor" id="id_vendedor" value="{{$vendedor->id}}">
        <div class="box-footer">
            @include('painel.includes.form_buttons_default')
        </div>

            <div class="box-body">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome:</label>
                    <div class="col-sm-8">
                    <input type="text" disabled="true" class="form-control" id="nome" name="nome" placeholder="Digite o nome do vendedor.." value="@if(!empty($vendedor)){{ $vendedor->nome}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha_acesso" class="col-sm-2 control-label">Senha de Acesso</label>
                    <div class="col-sm-8">
                    <input type="text" disabled="true" class="form-control" id="senha_acesso" name="senha_acesso" placeholder="Digite '99' para todas" value="@if(!empty($vendedor)) {{$vendedor->senha_acesso}} @endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="token" class="col-sm-2 control-label">Token:</label>
                    <div class="col-sm-8">
                    <input type="password" disabled="true" class="form-control" id="token" name="token" placeholder="Gerado automaticamente pelo sistema.." value="@if(!empty($vendedor)){{ $vendedor->token }}@endif">
                    </div>
                </div>
                <div class="form-group">
                    <label for="token" class="col-sm-2 control-label">Status:</label>
                    <div class="col-sm-8">

                    <select disabled="true" id="status" name="status" class="form-control" required>
                        <option value="0" @if((isset($vendedor))and($vendedor->status == '0')) selected @endif >Inativo</option>
                        <option value="1" @if((isset($vendedor))and($vendedor->status == '1')) selected @endif >Ativo</option>
                    </select>
                    </div>
                </div>

            <!------------- VendZOnas TABLE!!!! -------->

          <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Zonas deste vendedor</h3>

                    </div>


                <div class="box-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Descricao</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($vendzona))
                      @forelse ($vendzona as $i)
                    <tr>
                        <td>{{$i->zona->id}}</td>
                        <td>{{$i->zona->nome}}</td>
                        <td>#</td>
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


        </form>

      </div>

    </div> <!-- acho q é o fim do box -->


</div>



@endsection
