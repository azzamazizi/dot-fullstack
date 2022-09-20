  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assetslte/images/user.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <small>Hak akses anda : {{ Auth::user()->role }}</small><br>
        </div><br><br><br>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li class="{{ (request()->is('home*')) ? 'active' : null ; }}"><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
        @canany(['admin','user'])

        <li class="treeview {{ (request()->is('berita*')) ? 'active' : null ; }} {{ (request()->is('ms_kategoriberita*')) ? 'active' : null ; }}">
          <a href="#">
            <i class="fa fa-book"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (request()->is('berita*')) ? 'active' : null ; }}"><a href="{{ url('berita') }}"><i class="fa fa-circle-o"></i> List Berita</a></li>
            <li class="{{ (request()->is('ms_kategoriberita*')) ? 'active' : null ; }}"><a href="{{ url('ms_kategoriberita') }}"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
          </ul>
        </li>
        @endcan      

        @canany(['admin'])
        <li class="header">Manajemen Aplikasi</li>
        <li class="{{ (request()->is('user*')) ? 'active' : null ; }}"><a href="{{ url('user') }}"><i class="fa fa-users"></i> <span>Pengguna</span></a></li>
        @endcan
        


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>