<section class="py-20 px-56 bg-[#0A199F] text-white">
    <div class="flex items-center space-x-6 mb-10">
        <h2 class="text-3xl text-center font-bold font-techno">Reseñas de nuestros clientes</h2>
        <div class="flex-grow border-t border-white/30"></div>
    </div>

    <div id="review-carousel" class="relative perspective-3d h-[430px] overflow-visible">
        <div id="carousel-inner" class="w-full h-full relative">
            {{-- @foreach($reviews as $review)
                <x-review-card
                    user="{{ $review->user->name }}"
                    avatar="{{ $review->user->avatar ?? '/images/default-avatar.png' }}"
                    rating="{{ $review->rating }}"
                    comments="{{ $review->comments }}"
                />
            @endforeach --}}
        </div>
    </div>
</section>