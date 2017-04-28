<div class="col-md-3 left_col">
   <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
         <a class="site_title" href="/matriculas/public/inicio">
            <i class="fa fa-institution">
            </i>
            <span>
               Fusagasugá
            </span>
         </a>
      </div>
      <div class="clearfix">
      </div>
      <!-- menu prile quick info -->
      <div class="profile">
         <div class="profile_pic">
            <img alt="..." class="img-circle profile_img" src="{{ asset('plugins/images/' . Auth::user()->imagen) }}">
            </img>
         </div>
         <div class="profile_info">
            <span>
               Bienvenido,
            </span>
            <h2>
               {{  Auth::user()->nombre . ' ' . Auth::user()->apellido  }}
            </h2>
         </div>
      </div>
      <!-- /menu prile quick info -->
      <br/>
      <!-- sidebar menu -->
      <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
         <div class="menu_section">
            <h3>
               Menu General
            </h3>
            <ul class="nav side-menu">

               <li>
                  <a href="/matriculas/public/inicio">
                     <i class="fa fa-map-marker">
                     </i>
                     Mapa Instituciones Educativas
                  </a>
               </li>
               @if (Auth::user()->matricula == "Activa" && Auth::user()->tipo == "usuario")
               <li>
                  <a disapled="" href="{{ route('instituciones.matricula', Auth::user()->id) }}">
                     <i class="fa fa-laptop">
                     </i>
                     Mi Matricula
                  </a>
               </li>
               @endif
          
          @if (Auth::user()->tipo == "administrador")
               <li>
                  <a href="{{ route('estudiantes.index') }}">
                     <i class="fa fa-users">
                     </i>
                     Estudiantes
                  </a>
               </li>
               <li>
                  <a href="{{ route('familiares.index') }}">
                     <i class="fa fa-user">
                     </i>
                     Familiares
                  </a>
               </li>
               <li>
                  <a href="{{ route('rectores.index') }}">
                     <i class="fa fa-user-secret" aria-hidden="true"></i>
                     </i>
                     Rectores
                  </a>
               </li>
               <li>
                  <a href="{{ route('instituciones.index') }}">
                     <i class="fa fa-university" aria-hidden="true">
                     </i>
                     Instituciones
                  </a>
               </li>
               <li>
                  <a href="{{ route('matriculas.index') }}">
                     <i class="fa fa-pencil-square-o">
                     </i>
                     Matriculas
                  </a>
               </li>
               <li>
                  <a href="{{ route('usuarios.index') }}">
                     <i class="fa fa-user-secret" aria-hidden="true"></i>
                     </i>
                     Usuarios
                  </a>
               </li>
               @endif
            </ul>
         </div>
      </div>
   </div>
</div>