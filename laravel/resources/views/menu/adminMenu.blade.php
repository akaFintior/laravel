<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('') ? 'index' : '' }}"
                       href="{{ route('index') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.addNews') ? 'active' : '' }}"
                       href="{{ route('admin.addNews') }}">Добавить новость</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}"
                       href="{{ route('admin.categories.index') }}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.adminConf') ? 'active' : '' }}"
                       href="{{ route('admin.adminConf') }}">Все профили</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.test1') ? 'active' : '' }}"
                       href="{{ route('admin.test1') }}">Скачать страницу</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.test2') ? 'active' : '' }}"
                       href="{{ route('admin.test2') }}">Скачать JSON</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "
                       href="{{ route('admin.parser') }}">Парсер</a>
                </li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('updateProfile') }}">Изменить профиль</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
