<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Signup extends Component
{
    #[Validate('required')]
    public  $email='';
    #[Validate('required')]
    public $password;
    #[Validate('required')]
    public $name="";
public function save()
{
    $this->validate();
    User::create($this->only(['name','email','password']));

     return redirect()->route('login');



}
    public function render()
    {
        return view('livewire.signup')->layout('components.app');
    }

}
