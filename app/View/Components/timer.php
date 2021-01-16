<?php

namespace App\View\Components;

use Illuminate\View\Component;

class timer extends Component
{
    public $code;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.timer');
    }
}
