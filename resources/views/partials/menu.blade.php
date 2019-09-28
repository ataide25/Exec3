<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
         
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle active" href="#">
                        <i class="fa-fw fas fa-school nav-icon">
                        </i>
                        Menu
                    </a>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.instituicao.index") }}" class="nav-link {{ request()->is('admin/instituicao') || request()->is('admin/instituicao/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-building nav-icon">
                                    </i>
                                    Instituições
                                </a>
                            </li>
                    </ul>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.curso.index") }}" class="nav-link {{ request()->is('admin/curso') || request()->is('admin/curso/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-graduation-cap nav-icon">
                                    </i>
                                    Cursos
                                </a>
                            </li>
                    </ul>
                    <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.aluno.index") }}" class="nav-link {{ request()->is('admin/aluno') || request()->is('admin/aluno/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-graduate nav-icon">
                                    </i>
                                    Alunos
                                </a>
                            </li>
                    </ul>
                </li>
      
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>