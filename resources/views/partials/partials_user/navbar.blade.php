<nav class="bg-white py-3">
    <button class="hamburger" onclick="toggleMenu()">
        <i class="bi bi-list"></i>
    </button>
    
    <div class="container">

        <div class="text-center mb-3">
            <h1 class=logo>ELORA BEAUTY</h1>
        </div>

        <div class="d-flex justify-content-center align-items-center position-relative">
            <ul class="nav logoo gap-3">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#tentang">Tentang</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="/katalog">Katalog</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="/testimoni">Testimoni</a>
                </li>
            </ul>
            
           
            @auth
                <div class="dropdown position-absolute end-0">
                    <button class="btn-home dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; cursor: pointer;">
                        <i class="bi bi-person-circle"></i> {{ explode(' ', Auth::user()->name ?? 'Customer')[0] }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="border-radius: 10px;">
                        <li>
        <a class="dropdown-item fw-medium" href="/riwayat" style="color: #AE3168;">
            <i class="bi bi-clock-history"></i> Riwayat Pesanan
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger fw-bold" href="/logout">
                                <i class="bi bi-box-arrow-right"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="btn-home position-absolute end-0">Login</a>
            @endauth

        </div>

    </div>
</nav>