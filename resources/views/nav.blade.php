<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Master Data</span>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarMasterData" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarMasterData">
            <i class="ri-pages-line"></i> <span data-key="t-pages">Master Data</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarMasterData">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('kode_rekening.index') }}" class="nav-link" data-key="t-kode-rek">
                        Kode Rekening
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('lingkungan.index') }}" class="nav-link" data-key="t-lingkungan">
                        Lingkungan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('warga.index') }}" class="nav-link" data-key="t-warga">
                        Warga
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarPeriodeBayar" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarPeriodeBayar">
            <i class="ri-wallet-line "></i> <span data-key="t-apps">Periode Bayar</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarPeriodeBayar">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('period.index') }}" class="nav-link" data-key="t-period"> Semua Periode Bayar
                    </a>
                </li>
            </ul>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarDewan" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarDewan">
            <i class="ri-shield-user-line"></i> <span data-key="t-apps">Dewan</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarDewan">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link" data-key="t-dewan"> Semua Dewan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link" data-key="t-dewan-add"> Tambah Data </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarAnggaran" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarAnggaran">
            <i class="ri-wallet-line "></i> <span data-key="t-apps">Anngaran</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarAnggaran">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="nav-link" data-key="t-dewan"> Semua Anggaran
                    </a>
                </li>
            </ul>
        </div>
    </li>


</ul>
