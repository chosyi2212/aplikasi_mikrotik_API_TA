<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
          <img src="{{ asset('template-dashboard') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::guard('user')->user()->name }}</a>
          {{-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> --}}
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('dashboard') ? 'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                  Dashboard

                </p>
            </a>
        </li>
        <li class="nav-item has-treeview {{ request()->is('userpelanggan/index', 'pelanggan/index','PPPoEsecret/index','pppoe_profile/index') ? 'menu-open':'' }}">
          <a href="#" class="nav-link {{ request()->is('userpelanggan/index', 'pelanggan/index','PPPoEsecret/index','pppoe_profile/index') ? 'active':'' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Pelanggan PPPoE
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('userpelanggan.index') }}" class="nav-link {{ request()->is('userpelanggan/index') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p> User Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pelanggan.index') }}" class="nav-link {{ request()->is('pelanggan/index') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Layanan Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('PPPoEsecret.index') }}" class="nav-link {{ request()->is('PPPoEsecret/index') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Aktif</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pppoe_profile.index') }}" class="nav-link {{ request()->is('pppoe_profile/index') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>PPPoE Profile</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ request()->is('paket/index', 'poolip/index','paket/log') ? 'menu-open':'' }}">
            <a href="#" class="nav-link {{ request()->is('paket/index', 'poolip/index','paket/log') ? 'active':'' }}">
                <i class="fas fa-solid fa-network-wired nav-icon"></i>
                <p>
                    Master Layanan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('paket.index') }}" class="nav-link {{ request()->is('paket/index') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Paket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paket.log') }}" class="nav-link {{ request()->is('paket/log') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Up grade Paket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('poolip.index') }}" class="nav-link {{ request()->is('poolip/index') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ip Pool</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ request()->is('billing/index', 'masterbulan/index','transaksi/index','konfirmasibayar/index') ? 'menu-open':'' }}">
            <a href="#" class="nav-link {{ request()->is('billing/index', 'masterbulan/index','transaksi/index','konfirmasibayar/index') ? 'active':'' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('billing.index') }}" class="nav-link {{ request()->is('billing/index') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Billing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('masterbulan.index') }}" class="nav-link {{ request()->is('masterbulan/index') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Bulan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaksi.index') }}" class="nav-link {{ request()->is('transaksi/index') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi data</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('konfirmasibayar.index') }}" class="nav-link {{ request()->is('konfirmasibayar/index') ? 'active':'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konfirmasi Pelanggan</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('routercon.index') }}" class="nav-link {{ request()->is('routercon/index') ? 'active':'' }}">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Router Connect
              </p>
            </a>
          </li>
          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Setting Instansi
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
    <!-- /.sidebar-menu -->
  </div>
