<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Poster extends Component
{
    public $film;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($film)
    {
        $this->film = $film;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.film.poster');
    }
}
