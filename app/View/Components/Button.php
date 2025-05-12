<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    public string $url;
    public bool $isPrimary;

    /**
     * Create a new component instance.
     */
    public function __construct($url = '#', $isPrimary = false)
    {
        $this->url = $url;
        $this->isPrimary = $isPrimary;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
