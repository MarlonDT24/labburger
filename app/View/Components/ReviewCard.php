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
    /**
     * Create a new component instance.
     */
    public function __construct($user = 'not found', $avatar = '', $comments = 'not found', $rating = 0)
    {
        $this->user = $user;
        $this->avatar = $avatar;
        $this->comments = $comments;
        $this->rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-card');
    }
}
