<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
class AllBlog extends Component
{

    use WithPagination;
    public $perPage=10;

    
    public function mount(){
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.all-blog',[
            'posts' => Post::paginate($this->perPage)
        ]);
    }
}
