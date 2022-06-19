<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public ?string $dialogclass;
    /**
     * Create a new component instance.
     *
     * @param string|null $dialogclass
     * @return void
     */
    public function __construct(string $dialogclass = null)
    {
        if ($dialogclass) $dialogclass = " $dialogclass";
        $this->dialogclass = $dialogclass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
