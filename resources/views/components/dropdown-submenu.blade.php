<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownSubmenu extends Component
{
    public $playlist;
    public $workout;

    public function __construct($playlist, $workout)
    {
        $this->playlist = $playlist;
        $this->workout = $workout;
    }

    public function render()
    {
        return view('components.dropdown-submenu');
    }
}
