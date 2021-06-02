 <div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="{{ asset('wa2.png') }}" class="header-logo" /> <span
        class="logo-name">WA BLAST</span>
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Main</li>
      @if($role_pay->pay == 2)
      <li class="dropdown">
        <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
      </li>
      @if(auth()->user()->id_data == 1)
      <li><a href="{{ route('notification') }}" class="nav-link "><i data-feather="layers"></i><span>Notification</span></a></li>
      @endif
      <li><a class="nav-link" href="{{ route('waweb') }}"><i data-feather="briefcase"></i><span>WhatsApp</span></a></li>
      <li><a href="{{ route('database') }}" class="nav-link "><i data-feather="command"></i><span>DataBase</span></a></li>
      <li><a href="{{ route('profile') }}" class="nav-link "><i data-feather="user"></i><span>Profile</span></a></li>
      <li><a href="{{ route('user') }}" class="nav-link "><i data-feather="user-check"></i><span>Users</span></a></li>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link "><i data-feather="home"></i><span>Logout</span></a></li>
      @else
      <li class="dropdown">
        <a href="{{ route('bayar') }}" class="nav-link"><i data-feather="monitor"></i><span>Pembayaran</span></a>
      </li>
      <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="nav-link "><i data-feather="home"></i><span>Logout</span></a></li>
      @endif
    </ul>
  </aside>
</div>