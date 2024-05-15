<?php

namespace App\Livewire;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $todos;
    public $title='';
    public  $content="";
    public $todo_id;
    public $title_edit='';
    public  $content_edit="";
    public $todolist;


    public function save()
    {
        Todo::create(['title'=>$this->title,'content'=>$this->content,'user_id'=>request()->user()->id]);
        return redirect('/');

    }
    public function update()
    {
        // Find the Todo record
        $todo = Todo::find($this->todo_id);

            $todo->update([
                'title' => $this->title_edit,
                'content' => $this->content_edit
            ]);


        // Redirect back to the dashboard
        return redirect('/');
    }
    public function delete($id){
        Todo::destroy($id);
        return redirect('/');

    }
    public function mount()
    {
        // Retrieve todos for the current authenticated user
        $this->todos = User::find(Auth::id())->todos;


    }


    public function logout()
    {
        // Logout the user and redirect to the login page
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.home')->layout('components.app');
    }
}
