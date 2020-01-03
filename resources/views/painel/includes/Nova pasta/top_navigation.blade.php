<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fas fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('/storage/sem-foto.png')}}" alt="">{!! Auth::user()->name !!}
            <span class=" fas fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;">Perfil</a></li>
            <li>
              <a href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Opções</span>
              </a> 
            </li>
            <li><a href="javascript:;">Ajuda</a></li>
            <li>
              
              <a href="{{ url('/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Sair
              </a>

              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-envelope"></i>
            <span class="badge bg-green">{{$count_notificacions or '0'}}</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="{{asset('storage/sem-foto.png')}}" alt="Profile Image" /></span>
                <span>
                  <span>{{$user->name or 'Administrador'}}</span>
                  <span class="time">Há 3 mins.</span>
                </span>
                <span class="message">
                  Espacozin para notificações...
                </span>
              </a>
            </li>

              <div class="text-center">
                <a>
                  <strong>Ver tudo</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!--FIM /top navigation -->
