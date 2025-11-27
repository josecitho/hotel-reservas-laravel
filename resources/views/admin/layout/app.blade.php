<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#f3f4f6; min-height:100vh;">

    <header style="background:#111827; color:white; padding:12px 0;">
        <div style="max-width:1100px; margin:0 auto; display:flex; justify-content:space-between; align-items:center;">
            <div>
                <h1 style="margin:0; font-size:20px; font-weight:bold;">Hotel Admin</h1>
                <span style="font-size:12px; color:#9ca3af;">Panel de gestión de reservas</span>
            </div>

            <div>
                <a href="{{ route('hotel.index') }}"
                   style="margin-right:8px; font-size:13px; color:#e5e7eb; text-decoration:none;">
                    Volver al sitio
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit"
                            style="background:#dc2626; color:white; border:none; padding:6px 10px; border-radius:4px; font-size:13px; cursor:pointer;">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main style="max-width:1100px; margin:24px auto 40px;">
        @yield('content')
    </main>

</body>
</html>
