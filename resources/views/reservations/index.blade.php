@extends('layout')

@section('title', 'Administrar Reservas')

@section('content')
<section class="bg-gray-300 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center text-blue-800 mb-8 font-techno">Administrar Reservas</h1>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-200 border-b border-blue-300">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">ID</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">Cliente</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">Fecha</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">Hora</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">Personas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">Teléfono</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-black uppercase">Email</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 border-b border-gray-300">
                    @forelse($reservations as $reservation)
                    <tr>
                        <td class="px-6 py-4 text-center">{{ $reservation->id }}</td>

                        <td class="px-6 py-4 font-bold text-center">
                            @if($reservation->user)
                                {{ $reservation->user->name }} {{ $reservation->user->surname }}
                            @else
                                {{ $reservation->name }} {{ $reservation->surname }}
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}
                        </td>

                        <td class="px-6 py-4 text-center">{{ $reservation->hour }}</td>

                        <td class="px-6 py-4 text-center">{{ $reservation->number_people }}</td>

                        <td class="px-6 py-4 text-center">{{ $reservation->phone }}</td>

                        <td class="px-6 py-4 text-center">{{ $reservation->email }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No hay reservas registradas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
