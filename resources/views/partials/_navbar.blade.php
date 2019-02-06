    <div class="container-menu-header">

            <div class="wrap_header">
                <a href="index.html" class="logo">
                    <img src="{{asset('images/1.png')}} "class="d-inline-block align-left">
                    <h8 > PT ANUGRAH DISTRIBUTOR INDONESIA</h8>
                </a>

                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            
                            <li class="{{ Request::is('/') ? 'sale-noti' : null }}">
                                <a href="{{ route('index') }}" >Home</a>
                            </li>

                            <li>
                                <a href="{{ route('catalogue') }}">Catalogue</a>
                            </li>

                            <li>
                                <a href="{{ route('tutorial') }}">Tutorial</a>
                            </li>

                            <li>
                                <a href="{{ route('about') }}">About</a>
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
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
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
                    <a href="{{ route('cart') }}"> 
                        <img src="{{ asset('images/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">
                            {{ is_null(Auth::user()->customer->cart) ? 0 : Auth::user()->customer->cart->products->groupBy('id')->count() }}
                        </span>
                    </a>    
                    </div>
                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                @php
                                    $persada = 0;
                                @endphp
                                @if (Auth::user()->customer->cart != null)
                                    @foreach (Auth::user()->customer->cart->products->groupBy('id') as $item)
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
                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <span class="topbar-child1">
                            Free shipping for standard order over $100
                        </span>
                    </li>

                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <div class="topbar-child2-mobile">
                            <span class="topbar-email">
                                fashe@example.com
                            </span>

                            <div class="topbar-language rs1-select2">
                                <select class="selection-1" name="time">
                                    <option>USD</option>
                                    <option>EUR</option>
                                </select>
                            </div>
                        </div>
                    </li>

                    <li class="item-topbar-mobile p-l-10">
                        <div class="topbar-social-mobile">
                            <a href="#" class="topbar-social-item fa fa-facebook"></a>
                            <a href="#" class="topbar-social-item fa fa-instagram"></a>
                            <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                        </div>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="index.html">Home</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="{{ route('catalogue') }}">Catalogue</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="product.html">Sale</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="cart.html">Features</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="blog.html">Blog</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="about.html">About</a>
                    </li>

                    <li class="item-menu-mobile">
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    <!-- </header> -->