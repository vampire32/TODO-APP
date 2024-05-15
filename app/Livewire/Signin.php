<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
class Signin extends Component
{

    #[Validate('required')]
    public $email='';
    #[Validate('required')]
    public $password='';

    public function save()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            return redirect('/');
        }

        // If authentication fails, throw a validation exception
        throw ValidationException::withMessages([
            'email' => __('auth.failed'), // Display an appropriate error message
        ]);

    }


    public function render()
    {
        return view('livewire.signin')->layout('components.app');;
    }
}
