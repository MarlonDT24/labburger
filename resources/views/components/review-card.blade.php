<div class="review-card bg-gray-50 rounded-lg shadow
    w-full max-w-lg mx-auto p-6 mb-6
    hover:scale-105 transform transition-all
    relative group">
    {{-- Botón eliminar visible para administradores --}}
    @auth
        @if (Auth::user()->type === 'administrador')
            <form action="{{ route('reviews.destroy', $reviewId) }}" method="POST" class="absolute top-3 left-3">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center shadow hover:bg-red-700 transition">
                    &times;
                </button>
            </form>
        @endif
    @endauth
    <div class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 text-xs font-semibold rounded-bl">{{ $rating }} estrellas
    </div>
    <div class="flex items-center mb-4">
        <img src={{ $avatar }} alt="Producto" class="h-14 w-14 sm:h-16 sm:w-16 rounded mr-3">
        <div>
            <p class="text-blue-800 sm:text-lg font-semibold font-techno">{{ $user }}</p>
            <div class="text-yellow-400 text-sm">
                @for ($i = 0; $i < $rating; $i++)
                    ⭐
                @endfor
            </div>
        </div>
    </div>
    <p class="text-gray-700 text-sm">“{{ $comments }}”</p>
    @if($product ?? null)
        <p class="text-sm text-blue-500 mt-2">Producto: {{ $product }}</p>
    @else
        <p class="text-sm text-gray-400 mt-2 italic">Reseña general</p>
    @endif
</div>
