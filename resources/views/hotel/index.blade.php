<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hotel Miramar Demo</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#f3f4f6; min-height:100vh; margin:0; font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;">

    <!-- BARRA SUPERIOR -->
    <header style="background:#0f172a; color:white; padding:12px 0;">
    <div style="max-width:1100px; margin:0 auto; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <h1 style="margin:0; font-size:22px; font-weight:bold;">Hotel Miramar Demo</h1>
            <span style="font-size:12px; color:#9ca3af;">Viña del Mar · Reservas en línea</span>
        </div>

        <nav style="display:flex; gap:14px; align-items:center; font-size:13px;">
            <a href="#contacto" style="color:#e5e7eb; text-decoration:none;">Contacto</a>
            <a href="#ubicacion" style="color:#e5e7eb; text-decoration:none;">Ubicación</a>
            <a href="#redes" style="color:#e5e7eb; text-decoration:none;">Redes</a>
            <a href="#mensaje" style="color:#e5e7eb; text-decoration:none;">Mensaje</a>
            <a href="#reserva" style="color:#e5e7eb; text-decoration:none;">Reservar</a>

            @auth
                <!-- Botón admin aparece SOLO si el usuario ya está logueado -->
                <a href="{{ route('admin.reservas.index') }}"
                   style="background:#e5e7eb; color:#0f172a; padding:6px 10px; border-radius:4px; font-weight:bold; text-decoration:none;">
                    Panel admin
                </a>

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit"
                            style="background:#dc2626; color:white; padding:6px 10px; border:none; border-radius:4px; font-size:13px; cursor:pointer;">
                        Salir
                    </button>
                </form>
            @endauth
        </nav>
    </div>
</header>


    <!-- CONTENIDO PRINCIPAL -->
    <main style="max-width:1100px; margin:24px auto 40px;">

        {{-- Mensaje de éxito de reserva --}}
        @if(session('success'))
            <div style="background:#dcfce7; border:1px solid #16a34a; color:#166534; padding:10px 12px; border-radius:6px; margin-bottom:16px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- SECCIÓN CONTACTO -->
        <section id="contacto" style="margin-bottom:24px;">
            <h2 style="font-size:22px; font-weight:bold; margin-bottom:8px;">Contacto</h2>
            <p style="font-size:13px; margin:0 0 8px 0; color:#4b5563;">
                Puedes usar estos datos de contacto como ejemplo para tu portafolio. Luego los cambias por tus datos reales si quieres.
            </p>
            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                <div style="background:white; border-radius:10px; padding:12px; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    <strong>Teléfono</strong>
                    <p style="margin:4px 0 0 0; font-size:13px;">+56 9 1234 5678</p>
                </div>
                <div style="background:white; border-radius:10px; padding:12px; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    <strong>Correo electrónico</strong>
                    <p style="margin:4px 0 0 0; font-size:13px;">contacto@hotelmirmar-demo.cl</p>
                </div>
                <div style="background:white; border-radius:10px; padding:12px; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    <strong>WhatsApp</strong>
                    <p style="margin:4px 0 6px 0; font-size:13px;">Escríbenos directo por WhatsApp:</p>
                    <a href="https://wa.me/56912345678?text=Hola,%20quiero%20hacer%20una%20reserva"
                       target="_blank"
                       style="display:inline-block; background:#22c55e; color:white; padding:6px 10px; border-radius:6px; font-size:13px; text-decoration:none;">
                        Abrir WhatsApp
                    </a>
                </div>
            </div>
        </section>

        <!-- SECCIÓN UBICACIÓN -->
        <section id="ubicacion" style="margin-bottom:24px;">
            <h2 style="font-size:20px; font-weight:bold; margin-bottom:8px;">Ubicación</h2>
            <p style="font-size:13px; margin:0 0 6px 0; color:#4b5563;">
                Av. San Martín 123, Viña del Mar, Chile (dirección de ejemplo para tu proyecto).
            </p>
            <div style="background:white; border-radius:10px; padding:12px; box-shadow:0 1px 2px rgba(0,0,0,0.1); font-size:12px; color:#6b7280;">
                Aquí podrías insertar un mapa de Google Maps cuando lo montes en producción.
            </div>
        </section>

        <!-- SECCIÓN REDES SOCIALES -->
        <section id="redes" style="margin-bottom:24px;">
            <h2 style="font-size:20px; font-weight:bold; margin-bottom:8px;">Redes sociales</h2>
            <p style="font-size:13px; margin:0 0 8px 0; color:#4b5563;">
                En un sitio real aquí irían las redes sociales del hotel. Por ahora son enlaces de ejemplo.
            </p>
            <div style="display:flex; flex-wrap:wrap; gap:10px;">
                <a href="#" style="background:white; padding:8px 12px; border-radius:999px; font-size:13px; text-decoration:none; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    Facebook
                </a>
                <a href="#" style="background:white; padding:8px 12px; border-radius:999px; font-size:13px; text-decoration:none; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    Instagram
                </a>
                <a href="#" style="background:white; padding:8px 12px; border-radius:999px; font-size:13px; text-decoration:none; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    TikTok
                </a>
                <a href="#" style="background:white; padding:8px 12px; border-radius:999px; font-size:13px; text-decoration:none; box-shadow:0 1px 2px rgba(0,0,0,0.1);">
                    YouTube
                </a>
            </div>
        </section>

        <!-- SECCIÓN MENSAJE / FORMULARIO DE CONTACTO -->
        <section id="mensaje" style="margin-bottom:32px;">
            <h2 style="font-size:20px; font-weight:bold; margin-bottom:8px;">Envíanos un mensaje</h2>
            <p style="font-size:13px; margin:0 0 8px 0; color:#4b5563;">
                Este formulario es de ejemplo para mostrar en tu portafolio. Más adelante puedes conectarlo a una tabla de mensajes o a un correo.
            </p>

            <form action="#" method="POST" style="background:white; border-radius:10px; padding:16px; box-shadow:0 1px 3px rgba(0,0,0,0.1); max-width:600px;">
                <div style="margin-bottom:8px;">
                    <label style="font-size:13px; display:block; margin-bottom:4px;">Nombre</label>
                    <input type="text" name="nombre"
                           style="width:100%; border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px;">
                </div>
                <div style="margin-bottom:8px;">
                    <label style="font-size:13px; display:block; margin-bottom:4px;">Correo</label>
                    <input type="email" name="email"
                           style="width:100%; border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px;">
                </div>
                <div style="margin-bottom:8px;">
                    <label style="font-size:13px; display:block; margin-bottom:4px;">Mensaje</label>
                    <textarea name="mensaje" rows="4"
                              style="width:100%; border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px; resize:vertical;"></textarea>
                </div>
                <button type="submit"
                        style="background:#0f172a; color:white; padding:8px 14px; border:none; border-radius:4px; font-size:13px; font-weight:bold; cursor:pointer;">
                    Enviar mensaje (demo)
                </button>
            </form>
        </section>

        <!-- SECCIÓN RESERVA (LO QUE YA TENEMOS) -->
        <section id="reserva">
            <h2 style="font-size:22px; font-weight:bold; margin-bottom:12px;">Reserva tu habitación</h2>
            <p style="font-size:13px; margin:0 0 14px 0; color:#4b5563;">
                Esta sección está conectada a la base de datos. Cada reserva que envíes se guarda y el administrador la ve en el panel de administración.
            </p>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:16px;">
                @foreach($rooms as $room)
                    <div style="background:white; border-radius:10px; padding:16px; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                        <h3 style="font-size:18px; font-weight:bold; margin-bottom:6px;">
                            Habitación {{ $room->number }}
                        </h3>

                        <p style="margin:0;"><strong>Tipo:</strong> {{ $room->type }}</p>
                        <p style="margin:0;"><strong>Capacidad:</strong> {{ $room->capacity }} personas</p>
                        <p style="margin:0 0 8px 0;"><strong>Precio:</strong>
                            ${{ number_format($room->price_per_night, 0, ',', '.') }} / noche
                        </p>

                        <hr style="margin:10px 0;">

                        <form action="{{ route('hotel.reserve') }}" method="POST" style="display:flex; flex-direction:column; gap:8px; margin-top:8px;">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">

                            <input type="text" name="guest_name"
                                   placeholder="Tu nombre" required
                                   style="border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px;">

                            <input type="email" name="guest_email"
                                   placeholder="Tu correo (opcional)"
                                   style="border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px;">

                            <div style="font-size:12px; color:#6b7280;">Check-in</div>
                            <input type="date" name="check_in" required
                                   style="border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px;">

                            <div style="font-size:12px; color:#6b7280;">Check-out</div>
                            <input type="date" name="check_out" required
                                   style="border:1px solid #d1d5db; border-radius:4px; padding:6px; font-size:13px;">

                            <button type="submit"
                                    style="margin-top:6px; background:#1d4ed8; color:white; padding:8px; border:none; border-radius:4px; font-size:13px; font-weight:bold; cursor:pointer;">
                                Reservar esta habitación
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    <footer style="background:#0f172a; color:#9ca3af; padding:10px 0; font-size:12px; text-align:center;">
        Proyecto de portafolio · Sistema de reservas de hotel con Laravel · Desarrollado por José
    </footer>

</body>
</html>


