@extends('admin.layout.app')

@section('content')

<h2 style="font-size:24px; font-weight:bold; margin-bottom:16px;">Reservas</h2>

@if(session('success'))
    <div style="background:#dcfce7; border:1px solid #16a34a; color:#166534; padding:10px 12px; border-radius:6px; margin-bottom:16px;">
        {{ session('success') }}
    </div>
@endif

<div style="background:white; border-radius:10px; box-shadow:0 1px 3px rgba(0,0,0,0.1); overflow:hidden;">
    <table style="width:100%; border-collapse:collapse; font-size:13px;">
        <thead style="background:#e5e7eb; color:#374151; text-transform:uppercase; font-size:11px;">
            <tr>
                <th style="padding:8px;">ID</th>
                <th style="padding:8px;">Habitación</th>
                <th style="padding:8px;">Huésped</th>
                <th style="padding:8px;">Fechas</th>
                <th style="padding:8px;">Total</th>
                <th style="padding:8px;">Estado</th>
                <th style="padding:8px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $r)
                <tr style="border-top:1px solid #e5e7eb;">
                    <td style="padding:8px; text-align:center;">{{ $r->id }}</td>
                    <td style="padding:8px;">
                        {{ $r->room->number }}<br>
                        <span style="font-size:11px; color:#6b7280;">{{ $r->room->type }}</span>
                    </td>
                    <td style="padding:8px;">
                        {{ $r->guest_name }}<br>
                        <span style="font-size:11px; color:#6b7280;">{{ $r->guest_email }}</span>
                    </td>
                    <td style="padding:8px;">
                        {{ $r->check_in }}<br>
                        <span style="font-size:11px; color:#6b7280;">{{ $r->check_out }}</span>
                    </td>
                    <td style="padding:8px;">
                        ${{ number_format($r->total_price, 0, ',', '.') }}
                    </td>
                    <td style="padding:8px;">
                        @php
                            $bg = '#fef3c7'; $color = '#92400e'; // pending
                            if ($r->status === 'confirmed') { $bg = '#dcfce7'; $color = '#166534'; }
                            if ($r->status === 'cancelled') { $bg = '#fee2e2'; $color = '#991b1b'; }
                        @endphp
                        <span style="background:{{ $bg }}; color:{{ $color }}; padding:2px 6px; border-radius:999px; font-size:11px;">
                            {{ ucfirst($r->status) }}
                        </span>
                    </td>
                    <td style="padding:8px; white-space:nowrap;">
                        <form action="{{ route('admin.reservas.updateStatus', $r) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="confirmed">
                            <button type="submit"
                                    style="background:#16a34a; color:white; border:none; padding:4px 8px; border-radius:4px; font-size:11px; cursor:pointer; margin-right:4px;">
                                Confirmar
                            </button>
                        </form>

                        <form action="{{ route('admin.reservas.updateStatus', $r) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit"
                                    style="background:#dc2626; color:white; border:none; padding:4px 8px; border-radius:4px; font-size:11px; cursor:pointer;">
                                Cancelar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="padding:16px; text-align:center; color:#6b7280;">
                        No hay reservas todavía.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

