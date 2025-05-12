<a id={{ $isPrimary ? "btnPedido" : "btnReserva"}} href={{ $url }}
class="px-4 py-2 rounded-md shadow-md font-techno
    {{ $isPrimary
    ? "text-gray-300 bg-[#0A199F] transition-transform transform hover:scale-105
        font-semibold tracking-wide"
    : "text-black bg-gray-400 transition-all duration-300 tracking-wide"
    }}
">
{{ $slot }}
</a>
