<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public string $icon;
    public string $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, string $message)
    {
        $this->icon = $icon;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
