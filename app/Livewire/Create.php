<?php

namespace App\Livewire;

use Livewire\Component;

class Create extends Component
{
    public $user_id;

    public function render()
    {
        return view('livewire.create');
    }
    public function mount()
    {
        $this->user_id=request()->user()->id;

    }
}
