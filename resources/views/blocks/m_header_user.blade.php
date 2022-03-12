<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
      <ul class="menu_top_nav">
        {{-- <li class="menu_item has-children">
          <a href="#">
            usd
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="menu_selection">
            <li><a href="#">cad</a></li>
            <li><a href="#">aud</a></li>
            <li><a href="#">eur</a></li>
            <li><a href="#">gbp</a></li>
          </ul>
        </li>
        <li class="menu_item has-children">
          <a href="#">
            English
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="menu_selection">
            <li><a href="#">French</a></li>
            <li><a href="#">Italian</a></li>
            <li><a href="#">German</a></li>
            <li><a href="#">Spanish</a></li>
          </ul>
        </li> --}}
        <li class="menu_item has-children">
          <a href="#">
            @guest
                Đăng nhập
            @else
                Xin chào {{ Auth::user()->name }}
            @endguest
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="menu_selection">
            @guest
                    @if (Route::has('login'))
                      <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
                    @endif

                    @if (Route::has('register'))
                      <li><a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng ký</a></li>
                    @endif
                  @else
                    <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  @endguest
          </ul>
        </li>
        <li class="menu_item"><a href="/">Trang chủ</a></li>
        <li class="menu_item"><a href="/khuyen-mai">Khuyễn mãi</a></li>
        <li class="menu_item"><a href="/tin-tuc">blog</a></li>
        <li class="menu_item"><a href="/gioi-thieu">Giới thiệu</a></li>
      </ul>
    </div>
  </div>