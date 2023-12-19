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
                    <a href="{{ route('tarif.index') }}" class="nav-link" data-key="t-tarif">
                        Tarif
                    </a>
                </li>

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
        <a class="nav-link menu-link" href="#sidebarTagihan" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarTagihan">
            <i class="ri-bar-chart-grouped-line"></i> <span data-key="t-apps">Pemakaian/Tagihan</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarTagihan">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('pemakaian.index') }}" class="nav-link" data-key="t-period"> Tampilkan Data
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link menu-link" href="#sidebarPembayaran" data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarPembayaran">
            <i class="ri-money-dollar-box-line"></i> <span data-key="t-apps">Pembayaran</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarPembayaran">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('pemakaian.index') }}" class="nav-link" data-key="t-period"> Isi Deposit
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran.index') }}" class="nav-link" data-key="t-period"> Tampilkan Data
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran.recap') }}" class="nav-link" data-key="t-period"> Rekap
                    </a>
                </li>
            </ul>
        </div>
    </li>


</ul>
