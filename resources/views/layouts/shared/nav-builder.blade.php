
        <div class="c-sidebar-brand">
            {{-- <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="118" height="46" alt="CoreUI Logo">
            <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="118" height="46" alt="CoreUI Logo"> --}}
            <h3 class="c-sidebar-brand-full">KAB-BOALEMO</h3>
        </div>
        <ul class="c-sidebar-nav">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('admin.ui')}}">
                    <i class="c-sidebar-nav-icon cil-speedometer"></i>Dashboard
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('admin.information.ui')}}">
                    <i class="c-sidebar-nav-icon cil-info"></i>Informasi
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('admin.permission.ui')}}">
                    <i class="c-sidebar-nav-icon cil-notes"></i>Perizinan
                </a>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="c-sidebar-nav-icon cil-monitor"></i>Layanan Online
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-mobile"></i>Pendaftaran Online
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-mobile"></i>Pengaduan Online
                        </a>
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="#">
                    <i class="c-sidebar-nav-icon cil-newspaper"></i>Berita
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="#">
                    <i class="c-sidebar-nav-icon cil-library"></i>Publikasi
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-folder"></i>Peraturan
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-folder"></i>Dokumen Perencanaan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{route('admin.gallery.ui')}}">
                    <i class="c-sidebar-nav-icon cil-image-plus"></i>Galeri Foto
                </a>
            </li>
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="c-sidebar-nav-icon cil-settings"></i>Pengaturan
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-user"></i>Profil Resto
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-notes"></i>Atur Nota
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-print"></i>Tambah Printer
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-qr-code"></i>QR-Code Produk
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            <i class="c-sidebar-nav-icon cil-rss"></i>Status
                        </a>
                    </li>
                </ul>
            </li>   
        </ul>
        
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>