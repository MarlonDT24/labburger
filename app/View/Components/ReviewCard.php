<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ReviewCard extends Component
{
    public string $user;
    public string $avatar;
    public string $review;
    public int $stars;
    /**
     * Create a new component instance.
     */
    public function __construct($user = 'not found', $avatar = '', $review = 'not found', $stars = 0)
    {
        $this->user = $user;
        $this->avatar = $avatar;
        $this->review = $review;
        $this->stars = $stars;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-card');
    }
}
