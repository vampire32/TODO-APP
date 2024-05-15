<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $todos;
    public $todoid;
//    public $title;
//    public $content;

    public function mount()
    {
        // Retrieve todos for the current authenticated user
        $this->todos = User::find(request()->user()->id)->todos;
    }

    public function save()
    {

        dd($this->todoid);
    }

    public function logout()
    {
        // Logout the user and redirect to the login page
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()

    {

        // Render the Livewire component view
        return view('livewire.home')->layout('components.app');
    }
}
