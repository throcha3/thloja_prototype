<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu Principal</h3>
    <ul class="nav side-menu">
      
     
      <li><a href="{{route('funcionario.index')}}"><i class="fas fa-id-card fa-lg" ></i> Funcionários </a></li>
      <li><a href="{{route('contrato.index')}}"><i class="fas fa-briefcase fa-lg"></i> Contratos </a></li>
      <li><a href="{{route('fichamedica.index')}}"><i class="fas fa-stethoscope fa-lg"></i> Ficha Médica </a></li>
      <li><a href="{{route('ferias.index')}}"><i class="fas fa-map-marked fa-lg"></i> Ferias </a></li>
      <li><a href="{{route('recibo.index')}}"><i class="fas fa-money-check-alt fa-lg"></i> Recibos </a></li>
      <li><a><i class="fas fa-folder-open fa-lg"></i> Cadastros adicionais <span class="fas fa-chevron-down fa-lg"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('setor.index')}}"><i class="fas fa-project-diagram fa-lg"></i> Setores </a></li>
          <li><a href="{{route('funcao.index')}}"><i class="fas fa-user-tie fa-lg" style="padding-right: 6px"></i> Funções </a></li>
          <li><a href="{{route('tipoocorrencia.index')}}"><i class="fas fa-stream fa-lg" style="padding-right: 4px"></i> Tipo de Ocorrencia </a>
          <li><a href="{{route('examecomplementar.index')}}"><i class="fas fa-heartbeat fa-lg" style="padding-right: 5px"></i> Exames Complementares </a></li>
          <li><a href="{{route('qualificacao.index')}}"><i class="fas fa-award fa-lg" style="padding-right: 7px"></i> Qualificações </a></li>
          <li><a href="{{route('transacao.index')}}"><i class="fas fa-money-bill-alt fa-lg"></i> Transações </a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="menu_section">
    <h3>Outros</h3>
    <ul class="nav side-menu">
      <li><a href="{{route('ferias.index')}}"><i class="fas fa-wrench fa-lg"></i> Parametros </a></li>  
    </ul>
  </div>

</div>
<!-- FIM/sidebar menu -->
