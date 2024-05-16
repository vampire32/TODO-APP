<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Posts extends Component
{
    use LivewireAlert;
    public $posts, $title, $body, $post_id;
    public $isOpen = 0;
    public $searchTerm = '';
    public $user_id;

    protected $listeners = ['searchUpdated'];

    public function loadPosts()
    {
        $this->posts = Post::where('title', 'like', '%' . $this->searchTerm . '%')->where(['user_id'=>request()->user()->id])->get();
    }


    public function render()
    {

        return view('livewire.posts')->layout('layouts.app');
    }
    public function mount(){
        $this->loadPosts();
        $this->user_id=request()->user()->id;

        $this->posts = Post::where(['user_id'=>request()->user()->id])->get();

    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }


    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->post_id = '';
    }


    public function store()
    {

        $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        if($this->post_id){
            Post::update(['id' => $this->post_id], [
                'title' => $this->title,
                'body' => $this->body,


            ]);

        }
        else{
            Post::create(['title'=>$this->title,'body'=>$this->body,'user_id'=>$this->user_id]);
        }



        session()->flash('message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->openModal();
    }


    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');


    }
    public function refresh()
    {
        $this->posts = Post::all();
    }
}
