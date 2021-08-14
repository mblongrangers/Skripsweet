    <div class="container-menu-header">

            <div class="wrap_header">
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{asset('images/KCA.png')}} "class="d-inline-block align-left">
                    {{-- <h8 > PT Kharisma Cahaya Abadi</h8> --}}
                </a>

                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            
                            <li>
                                <a class="{{ request()->is('/*') ? 'nav-active' : null }}" href="{{ route('index') }}" >Home</a>
                            </li>

                            <li>
                                <a class="{{ request()->is('catalogue*') ? 'nav-active' : null }}" href="{{ route('catalogue') }}">Catalogue</a>
                            </li>

                            <li>
                                <a class="{{ request()->is('tutorial*') ? 'nav-active' : null }}" href="{{ route('tutorial') }}">Tutorial</a>
                            </li>

                            <li>
                                <a class="{{ request()->is('about*') ? 'nav-active' : null }}" href="{{ route('about') }}">About</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header-icons">
                    @auth
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                        <ul class="main_menu">
                            <li>
                            <a class="{{ request()->is('login*') ? 'nav-active' : null }}" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>

                            <a class="{{ request()->is('register*') ? 'nav-active' : null }}" href="{{ route('register') }}">Register</a>
                            </li>
                    @endauth

                    <span class="linedivide1"></span>

                    @auth
                    

                    <div class="header-wrapicon2">
                        <a href="{{ route('account.my-account') }}">
                            <img src="{{ asset('images/icon-header-01.png') }} " class="header-icon1 js-show-header" alt="ICON" >
                        </a>
                    </div>
                    
                    <span class="linedivide1"></span>
                    <div class="header-wrapicon2">
                        <a href="{{ route('orders.index') }}">
                            <img src="{{ asset('images/icon-header-03.png') }} " class="header-icon1 js-show-header" alt="ICON" >
                        </a>
                        <span class="header-icons-noti">
                            {{ is_null(Auth::user()->customer->cart()) ? 0 : Auth::user()->customer->orders->count() }}
                        </span>
                    </div>
                    
                    <span class="linedivide1"></span>

                    <div class="header-wrapicon2">
                    <a href="{{ route('cart') }}"> 
                        <img src="{{ asset('images/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">
                            {{ is_null(Auth::user()->customer->cart()) ? 0 : Auth::user()->customer->cart()->products->groupBy('id')->count() }}
                        </span>
                    </a>    
                    </div>
                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                @php
                                    $persada = 0;
                                @endphp
                                @if (Auth::user()->customer->cart() != null)
                                    @foreach (Auth::user()->customer->cart()->products->groupBy('id') as $item)
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="{{ asset('storage/'. $item->first()->image) }}" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="#" class="header-cart-item-name">
                                                {{ $item->first()->name }}
                                            </a>

                                            @php
                                                $qty = 0;
                                                foreach ($item as $product) {
                                                    $qty += $product->pivot->quantity;
                                                    $persada += $product->pivot->price;
                                                }
                                            @endphp

                                            <span class="header-cart-item-info">
                                                {{ $qty }} x {{ number_format($item->first()->price) }}
                                            </span>
                                        </div>
                                    </li>
                                    @endforeach
                                @endif
                            </ul>

                            <div class="header-cart-total">
                                Total: {{ number_format($persada) }}
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{ route('cart', 1) }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
    <div class="wrap_header_mobile">
      <!-- Logo moblie -->
      <a href="index.html" class="logo-mobile">
        <img src="{{asset('images/1.png')}}" alt="IMG-LOGO">
      </a>

      <!-- Button show menu -->
      <div class="btn-show-menu">
        <!-- Header Icon mobile -->
        <div class="header-icons-mobile">
          <a href="#" class="header-wrapicon1 dis-block">
            <img src="{{ asset('images/icon-header-01.png') }}" class="header-icon1" alt="ICON">
          </a>

          <span class="linedivide2"></span>

          <div class="header-wrapicon2">
            <img src="{{ asset('images/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">0</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
              <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    <img src="images/item-cart-01.jpg" alt="IMG">
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      White Shirt With Pleat Detail Back
                    </a>

                    <span class="header-cart-item-info">
                      1 x $19.00
                    </span>
                  </div>
                </li>

                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    <img src="images/item-cart-02.jpg" alt="IMG">
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      Converse All Star Hi Black Canvas
                    </a>

                    <span class="header-cart-item-info">
                      1 x $39.00
                    </span>
                  </div>
                </li>

                <li class="header-cart-item">
                  <div class="header-cart-item-img">
                    <img src="images/item-cart-03.jpg" alt="IMG">
                  </div>

                  <div class="header-cart-item-txt">
                    <a href="#" class="header-cart-item-name">
                      Nixon Porter Leather Watch In Tan
                    </a>

                    <span class="header-cart-item-info">
                      1 x $17.00
                    </span>
                  </div>
                </li>
              </ul>

              <div class="header-cart-total">
                Total: $75.00
              </div>

              <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    View Cart
                  </a>
                </div>

                <div class="header-cart-wrapbtn">
                  <!-- Button -->
                  <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Check Out
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </div>
      </div>
    </div>

    <!-- Menu Mobile -->
        <div class="wrap-side-menu" >
            <nav class="side-menu">
                <ul class="main-menu">
                    
                    <li class="item-menu-mobile">
                        <a href="{{ route('index') }}">Home</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="{{ route('catalogue') }}">Catalogue</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="{{ route('tutorial') }}">Tutorial</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="{{ route('about') }}">About</a>
                    </li>

                </ul>
            </nav>
        </div>
    <!-- </header> -->