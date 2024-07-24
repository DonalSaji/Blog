<div>
    <div class="row row-cards">
        @forelse($posts as $post)
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <img src="/images/{{$post->image}}" alt="" class="card-img-top">
                <div class="card-body p-2">
                    <h3 class="m-0 mb-1">{{$post->title}}</h3>
                </div>
                <div class="d-flex">
                    <a href="{{route('author.posts.edit-post',['post_id'=>$post->id])}}" class="card-btn">Edit</a>
                    <a href=""wire:click.prevent='deletePost({{$post->id}})' class="card-btn">Delete</a>
                </div>
            </div>
        </div>
        @empty
<span class="text-danger">No Post(s) found</span>
        @endforelse
    </div>
<div class="d-block.mt-2">
    {{$posts->links('livewire::simple-bootstrap')}}
</div>

</div>
