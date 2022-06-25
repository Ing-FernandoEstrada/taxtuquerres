<?php

namespace App\View\Components;

use App\Models\Document;
use Illuminate\View\Component;

class Login extends Component
{
    public string $documents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->documents = Document::optionsHTML();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('auth.modal-login');
    }
}
