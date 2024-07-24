<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AllPosts extends Component
{
    use WithPagination;
    public $perPage=10;

    
    public function mount(){
        $this->resetPage();
    }

    public function deletePost($id)
    {
        $post=Post::find($id);
        $path="images/";
        $fimg=$post->image;
        if($fimg!=null && Storage::disk('public')->exists($path.$fimg)){
                    Storage::disk('public')->delete($path.$fimg);
                }
        $delete_post=$post->delete();
        
    }

   

    public function render()
    {
        return view('livewire.all-posts',[
            'posts' => Post::where('author_id', auth()->id())->paginate($this->perPage)
        ]);
    }
}
