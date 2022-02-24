<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ShowUserDetails extends Component
{
    public $id;
    public $name;
    public $email;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->id = Auth::user()->id;
        $this->email = Auth::user()->email;
        $this->name = Auth::user()->name;
        $this->title = $title;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show-user-details');
    }
}
