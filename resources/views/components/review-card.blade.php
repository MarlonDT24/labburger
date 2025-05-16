<div class="bg-gray-50 rounded-lg shadow
    w-full p-4 sm:p-6 lg:max-w-2xl
    hover:scale-105 transform transition-all
    relative group ">
    <div class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 text-xs font-semibold rounded-bl">{{ $stars }} estrellas
    </div>
    <div class="flex items-center mb-4">
        <img src={{ $avatar }} alt="Producto" class="h-14 w-14 sm:h-16 sm:w-16 rounded mr-3">
        <div>
            <p class="text-base sm:text-lg font-semibold">{{ $user }}</p>
            <div class="text-yellow-400 text-sm">
                @for ($i = 0; $i < $stars; $i++)
                    ⭐
                @endfor
            </div>
        </div>
    </div>
    <p class="text-gray-700 text-sm">“{{ $review }}”</p>
</div>
