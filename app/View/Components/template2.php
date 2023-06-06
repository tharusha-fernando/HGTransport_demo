<?php

namespace App\View\Components;

use Illuminate\View\Component;

class template2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $segment;
    public function __construct($segment)
    {
        $this->segment=$segment;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.template2');
    }
}
