<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChangeGovernmentShippingPrice extends Component
{
    /**
     * Create a new component instance.
     */

    public string $governmentId ;

    public function __construct($governmentId)
    {
        $this->governmentId = $governmentId ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.change-government-shipping-price');
    }
}
