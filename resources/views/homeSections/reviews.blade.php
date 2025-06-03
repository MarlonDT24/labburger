<section class="py-20 px-56 bg-[#0A199F] text-white">
    <div class="flex items-center space-x-6 mb-10">
        <h2 class="text-3xl text-center font-bold font-techno">Reseñas de nuestros clientes</h2>
        <div class="flex-grow border-t border-white/30"></div>
    </div>

    <div id="review-carousel" class="relative overflow-hidden h-[450px]">
        <div id="carousel-inner" class="absolute top-0 left-0 w-full">
            @foreach($reviews as $review)
                <x-review-card
                    user="{{ $review->user->name }}"
                    avatar="{{ $review->user->avatar ?? '/images/default-avatar.png' }}"
                    comments="{{ $review->comments }}"
                    rating="{{ $review->rating }}"
                    product="{{ $review->product->name ?? null }}"
                />
            @endforeach
        </div>
    </div>
</section>
