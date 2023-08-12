<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/img/thunder.png" alt="MayarListrik Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light ">MayarListrik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                @if (Auth::user()->id_level==1)

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/pelanggan') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Pelanggan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/petugas') }}" class="nav-link">
                        <i class="nav-icon 	fas fa-users"></i>
                        <p>
                            Data Petugas
                        </p>
                    </a>
                </li>
                <li class="nav-header">OPERASI</li>
                <li class="nav-item">
                    <a href="{{ url('admin/tarif') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Tarif
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/penggunaan') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Penggunaan
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ url('admin/tagihan') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Tagihan
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/pembayaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>

                </li>


                @endif
                @if (Auth::user()->id_level == 2)
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/penggunaan') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Penggunaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/tagihan') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Tagihan
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/pembayaran') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>