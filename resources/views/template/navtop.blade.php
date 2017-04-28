      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('plugins/images/' . Auth::user()->imagen) }}" alt="">{{ Auth::user()->nombre . ' ' . Auth::user()->apellido  }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li style="display: none"><a href="javascript:;">  Perfil</a>
                  </li>
                  <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>