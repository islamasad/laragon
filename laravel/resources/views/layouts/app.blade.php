<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App - @yield('title')</title>
    
    <!-- Tautan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- Tautan HTMX -->
    <script defer src="https://unpkg.com/htmx.org@1.9.6" integrity="sha384-FhXw7b6AlE/jyjlZH5iHa/tTe9EpJ1Y55RjcgPbjeWMskSxZt1v9qkxLJWNJaGni" crossorigin="anonymous"></script>
</head>
<body class="bg-body-tertiary" id="content">
    @if (!Auth::guest())   
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand ms-4 mb-1" href="#">
                    <img src="{{ asset('img/ui/building.svg') }}" alt="Building" class="img-fluid logo-svg">
                Kosmin
                </a>
                <nav class="nav nav-underline me-4">
                    <a class="nav-link link-dark {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" hx-get="{{ route('dashboard') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">Dashboard</a>
                    <!-- Tautan menu User -->
                    <a class="nav-link link-dark {{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}" hx-get="{{ route('user.index') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">User</a>
                    <!-- Tautan menu Guest -->
                    <a class="nav-link link-dark {{ request()->routeIs('guest.index') ? 'active' : '' }}" href="{{ route('guest.index') }}" hx-get="{{ route('guest.index') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">Guest</a>
                    <!-- Tautan menu Room -->
                    <a class="nav-link link-dark {{ request()->routeIs('room.index') ? 'active' : '' }}" href="{{ route('room.index') }}" hx-get="{{ route('room.index') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">Room</a>
                    <!-- Tautan menu Payment -->
                    <a class="nav-link link-dark {{ request()->routeIs('payment.index') ? 'active' : '' }}" href="{{ route('payment.index') }}" hx-get="{{ route('payment.index') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">Payment</a>
                    <!-- Tautan menu Activity -->
                    <a class="nav-link link-dark {{ request()->routeIs('activity.index') ? 'active' : '' }}" href="{{ route('activity.index') }}" hx-get="{{ route('activity.index') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">Activity</a>
                    <!-- Tautan menu Logout -->
                    <a class="nav-link link-dark" href="{{ route('logout') }}" hx-get="{{ route('logout') }}" hx-trigger="click" hx-target="#content" hx-push-url="true">Logout</a>
                </nav>
                
            </div>
        </nav>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show col-8 mx-auto mt-4" role="alert">
            <div>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        @if(is_array(session('error'))) {{-- Periksa jika error adalah array --}}
            <div class="alert alert-danger alert-dismissible fade show col-8 mx-auto mt-4" role="alert">
                <ul>
                    @foreach(session('error') as $errorMessage)
                        <li>{{ $errorMessage }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @else {{-- Jika error bukan array, tampilkan pesan biasa --}}
            <div class="alert alert-danger alert-dismissible fade show col-8 mx-auto mt-4" role="alert">
                <div>
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif

    <style>
        .custom-btn {
            min-width: 50px; /* Ukuran minimal */
            max-width: 100px; /* Ukuran maksimal */
        }

        .small-svg {
                width: 120px;
                height: 120px;
            }

        .logo-svg {
            width: 16px;
            height: 16px;
        }

        .modal-backdrop:nth-child(2n-1) {
        opacity : 0;
        }

        @media (max-width: 768px) {
            .custom-btn {
                min-width: 60px; /* Ukuran minimal pada layar kecil */
                max-width: 70px; /* Ukuran maksimal pada layar kecil */
            }

            .small-svg {
                width: 100px;
                height: 100px;
            }
        }
    </style>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        // Tangani perubahan URL dengan menggunakan popstate event
        window.addEventListener("popstate", function(event) {
            // Periksa URL atau lakukan tindakan lainnya sesuai kebutuhan
            var currentURL = window.location.href;
            console.log("URL berubah: " + currentURL);

            // Anda dapat menambahkan kode untuk memuat data tambahan atau melakukan tindakan lainnya
            // sesuai dengan URL yang baru.

            // Contoh: Ambil data dengan HTMX
            htmx.ajax({url: currentURL, target: "#content"});
        });
    </script>

</body>
</html>
