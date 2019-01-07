    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
      <a class="navbar-brand" href="#" style="font-family: arial;">
            <img src="{{asset('images/1.png')}}" width="50px" height="40" class="d-inline-block align-top" >
            PT Anugrah Distributor Indonesia
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
                  <a class="nav-link" href="{{ route('index') }}">Home </a>
                </li>
                <li class="nav-item {{ Request::is('catalogue') ? 'active' : null }}">
                  <a class="nav-link" href="{{ route('catalogue') }}">Catalogue Product</a>
                </li>
                <li class="nav-item {{ Request::is('tutorial') ? 'active' : null }}">
                  <a class="nav-link" href="{{ route('tutorial') }}">Tutorial Video</a>
                </li>
            </ul>
            @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="fa fa-cart-plus"></span>
                            <span class="badge badge-secondary">{{ is_null(Auth::user()->customer->cart) ? 0 : Auth::user()->customer->cart->products->groupBy('id')->count() }}</span>
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('account.my-account') }}">
                                {{ __('MyAccount') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('account.my-account') }}">
                                {{ __('Cart') }}
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
                </ul>
                @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                </ul>
            @endauth
        </div>
      </nav>
    </header>