<div id="alert_all" class="">
    <div class="alert">Đã thêm</div>
</div>
<div class="top_nav">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <ul class="top_nav_menu_left">
            <li><a href="/">Trang chủ</a></li>
            <li><a href="/khuyen-mai">Khuyễn mãi</a></li>
            <li><a href="/tin-tuc">blog</a></li>
            <li><a href="/gioi-thieu">Giới thiêu</a></li>
          </ul>
        </div>
        <div class="col-md-6 text-right">
          <div class="top_nav_right">
            <ul class="top_nav_menu">
              {{-- <!-- Currency / Language / My Account -->
              <li class="currency">
                <a href="#">
                  usd
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="currency_selection">
                  <li><a href="#">cad</a></li>
                  <li><a href="#">aud</a></li>
                  <li><a href="#">eur</a></li>
                  <li><a href="#">gbp</a></li>
                </ul>
              </li>
              <li class="language">
                <a href="#">
                  English
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="language_selection">
                  <li><a href="#">French</a></li>
                  <li><a href="#">Italian</a></li>
                  <li><a href="#">German</a></li>
                  <li><a href="#">Spanish</a></li>
                </ul>
              </li> --}}
              <li class="account">
                <a href="#">
                  @guest
                      Đăng nhập
                  @else
                      Xin chào {{ Auth::user()->name }}
                  @endguest
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="account_selection">
                  @guest
                    @if (Route::has('login'))
                      <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
                    @endif

                    @if (Route::has('register'))
                      <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
                    @endif
                  @else
                      @if(Auth::user()->role == 0)
                            <li>
                                <a href="/admin">Trang quản trị</a>
                            </li>
                        @endif
                    <li>
                      <a href="/user/thong-tin">Thông tin</a>
                    </li>
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Đăng xuất') }}
                    </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  @endguest
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Navigation -->
  <div class="main_nav_container">
    <div class="container">
      <div class="row py-2">
        <div class="col-lg-12 d-flex">
          <div class=" d-inline-block">
            <a href="/"><img src="{{ asset('upload/images/logo.png')}}" alt=""></a>
          </div>
          <div class="input-group w-50 mx-auto align-self-center d-md-flex d-none header_formSearch">
            <input type="text" id="ip_search_header" class="form-control" placeholder="Nhập để tìm kiếm" aria-label="Nhập để tìm kiếm" aria-describedby="button-addon2">
            <div class="list-group border rounded p-2 list_search" aria-hidden="true" id="list_name_search">
              <a href="/san-pham/tim-kiem/" id="val_search" class="list-group-item-action" aria-current="true">
                Tìm "<span ></span>"
              </a>
            </div>
          </div>
          <nav class="navbar navbar_home ml-auto mr-1">
            <ul class="navbar_user">
              <li class="d-md-none"><i class="fa fa-search" aria-hidden="true" title="Tìm kiếm"></i></li>
{{--              <li><a href="/san-pham/yeu-thich"><i class="fa fa-heart" aria-hidden="true" title="Yêu thích"></i></a></li>--}}
              <li class="checkout" title="Giỏ hàng">
                <a href="/san-pham/gio-hang">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <span id="checkout_items" class="checkout_items">0</span>
                </a>
              </li>
            </ul>
            <div class="hamburger_container">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
