<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Base extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.layouts.base');
    }
}
