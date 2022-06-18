<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $target;
    public $toggle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($target='div',$toggle='toggle')
    {
        $this->target = $target;
        $toggle = $toggle!='toggle'? 'dropdown_toggle '.$toggle:'dropdown_toggle';
        $this->toggle = $toggle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown');
    }
}
