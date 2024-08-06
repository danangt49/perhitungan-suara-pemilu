<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM INFORMASI PERHITUNGAN SUARA CALON LEGISLATIF DI DIY</title>
    <link rel="stylesheet" href="{{ asset('public/web/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('css')
</head>

<body>
    <header>
        <button class="menu-toggle" aria-label="Toggle menu">☰</button>
        <nav>
            <ul>
                @if (Auth::check())
                    <li><a href="{{ url('/') }}" data-section="home">Home</a></li>
                    @if (Auth::user()->role == 'admin')
                        <li><a href="{{ url('tps') }}" data-section="tps">Data TPS</a></li>
                        <li><a href="{{ url('saksi') }}" data-section="saksi">Data Saksi</a></li>
                        <li><a href="{{ url('perolehan-suara') }}" data-section="perolehan-suara">Perolehan
                                Suara</a></li>
                    @elseif (Auth::user()->role == 'owner')
                        <li><a href="{{ url('perolehan-suara') }}" data-section="perolehan-suara">Perolehan
                                Suara</a></li>
                    @elseif (Auth::user()->role == 'saksi')
                        <li><a href="{{ url('input-perolehan-suara') }}" data-section="home">Input Perolehan Suara</a>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" aria-label="Account options">Akun</a>
                        <div class="dropdown-content">
                            <a href="#">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->nama }}
                            </a>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <div class="datetime-container">
        <span id="datetime" class="datetime-display"></span>
    </div>

    @yield('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.querySelectorAll('nav ul li a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('nav ul li a').forEach(item => item.classList.remove('active'));
                this.classList.add('active');
                window.location.href = this.getAttribute('href');
            });
        });

        function updateDateTime() {
            const now = new Date();
            const optionsDate = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const optionsTime = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };

            const date = now.toLocaleDateString('id-ID', optionsDate);
            const time = now.toLocaleTimeString('id-ID', optionsTime);

            document.getElementById('datetime').innerText = `${date} ${time} WIB`;
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);

        document.querySelector('.menu-toggle').addEventListener('click', () => {
            document.querySelector('nav ul').classList.toggle('show');
        });

        // Dropdown menu toggle
        document.querySelector('.dropdown-toggle')?.addEventListener('click', (e) => {
            e.preventDefault();
            document.querySelector('.dropdown-content')?.classList.toggle('show');
        });

        // Hide dropdown if clicked outside
        document.addEventListener('click', (e) => {
            if (!document.querySelector('.dropdown')?.contains(e.target)) {
                document.querySelector('.dropdown-content')?.classList.remove('show');
            }
        });
    </script>
</body>

</html>
