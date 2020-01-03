@extends('painel.adminlte.full_dashboard')
@section('titulo_h1')
  <h1>Início</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-gear-a"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Ultima Atualização</span>
                <span class="info-box-number">@if(isset($ultima_at))
                    {{ \Carbon\Carbon::parse($ultima_at)->format('d/m/Y H:i')}}
                @else {{'?'}}
                @endif
                </span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-android-phone-portrait"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Versão atual do App</span>
                <span class="info-box-number">{{ $versao_app ?? '?'}}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-briefcase"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Produtos</span></span>
                <span class="info-box-number">{{ $total_produtos ?? '?'}}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-android-person"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Clientes</span>
                <span class="info-box-number">{{ $total_clientes ?? '?'}}</span>
            </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div> <!-- /row-->
@endsection
