<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Kampung Sarosah</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0
   ">
    <!-- Nav Item - Dashboard -->

    @if(session()->get('id_position') != 'KS3')

    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard </span></a>
    </li>

    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
    </div>


    <!-- Nav Item - Pages Collapse Menu -->
    @if(session()->get('id_position') == 'KS2')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_master" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Data Master</span>
        </a>
        <div id="menu_master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/wahana') }}">Wahana</a>
                <a class="collapse-item" href="{{ url('/visitor') }}">Pengunjung</a>
                <a class="collapse-item" href="{{ url('/employee') }}">Pegawai</a>
                <a class="collapse-item" href="{{ url('/position') }}">Jabatan</a>
                <a class="collapse-item" href="{{ url('/schedule') }}">Schedule </a>
                {{-- <a class="collapse-item" href="{{ url('/so') }}">Staff Operators </a> --}}
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_wahana" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Pengelolaan Wahana</span>
        </a>
        <div id="menu_wahana" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/visitor') }}">Penjadwalan</a>
                <a class="collapse-item" href="{{ url('/tools') }}">Peralatan Wahana</a>
                <a class="collapse-item" href="{{ url('/repair') }}">Riwayat Perbaikan</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_transaksi" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Data Transaksi</span>
        </a>
        <div id="menu_transaksi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/topup') }}">Top Up</a>
                <a class="collapse-item" href="{{ url('/transaction') }}">Transaksi</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_laporan" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span>
        </a>
        <div id="menu_laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/report/topup')}}">Laporan Top Up</a>
                <a class="collapse-item" href="{{url('/report/transaction_report')}}">Laporan Transaksi</a>
                <a class="collapse-item" href="{{route('wahana_report')}}">Laporan Wahana</a>
                {{-- <a class="collapse-item" href="{{route('report.operator')}}">Laporan Operator</a> --}}

            </div>
    </li>
    <hr class="sidebar-divider">
    @endif
    @if(session()->get('id_position') =='KS3')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_master" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Data Master</span>
        </a>
        <div id="menu_master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/visitor') }}">Pengunjung</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_transaksi" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Data Transaksi</span>
        </a>
        <div id="menu_transaksi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/topup') }}">Top Up</a>
                <a class="collapse-item" href="{{ url('/transaction') }}">Transaction</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_laporan" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span>
        </a>
        <div id="menu_laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/report/topup')}}">Top Up</a>
                <a class="collapse-item" href="{{url('/report/transaction_report')}}">Transaction</a>
            </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    <!-- Nav Item - Data Master -->
    @if(session()->get('id_position') == 'KS1')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_wahana" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Wahana</span>
        </a>
        <div id="menu_wahana" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/wahana')}}">Staff Wahana</a>
            </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu_laporan" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span>
        </a>
        <div id="menu_laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/report/topup')}}">Top Up</a>
                <a class="collapse-item" href="{{url('/report/transaction_report')}}">Transaction</a>
            </div>
    </li>
    <hr class="sidebar-divider">
    @endif

    <!-- Nav Item Transaksi-->
    <!--  @if(session()->get('id_position') == 'KS1' or session()->get('id_position') == 'KS2')
   <hr class="sidebar-divider">
   <li class="nav-item">
      <a class="nav-link" href="{{ route('user') }}">
      <i class="fas fa-fw fa-cog"></i>
      <span>Management User</span></a>
   </li>

   @endif -->
    <!-- Divider -->
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar
