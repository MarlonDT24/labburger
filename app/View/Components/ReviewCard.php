<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ReviewCard extends Component
{
    public string $avatar;
    public string $user;
    public int $rating;
    public string $comments;
    public string|null $product = null;
    public int $reviewId;
    /**
     * Create a new component instance.
     */
    public function __construct($user = 'not found', $avatar = '', $comments = 'not found', $rating = 0, $product = null, $reviewId = 0)
    {
        $this->user = $user;
        $this->avatar = $avatar;
        $this->comments = $comments;
        $this->rating = $rating;
        $this->product = $product;
        $this->reviewId = $reviewId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-card');
    }
}
