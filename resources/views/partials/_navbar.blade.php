    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <img src="https://diylogodesigns.com/wp-content/uploads/2016/02/Total-png-logo-download.png" alt="" height=50%" width="5%">
        <a class="navbar-brand" href="#">PT Anugrah Distributor Indonesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
              <a class="nav-link" href="{{ route('index') }}">Home </a>
            </li>
            <li class="nav-item {{ Request::is('catalogue') ? 'active' : null }}">
              <a class="nav-link" href="{{ route('catalogue') }}">Katalog Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item">
            @if (Route::has('login'))
                <div class="top-right links">
                    <div class="auth">
                    @auth
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('account.my-account') }}">
                                        {{ __('MyAccount') }}
                                    </a>
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
                    @else
                      
                        <a href="{{ route('login') }}" class="login">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register">Register</a>
                        @endif
                    </div>
                    @endauth
                </div>
            @endif
            </li>
          </ul>
          
        </div>
      </nav>
    </header>