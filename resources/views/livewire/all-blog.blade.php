<div>
    <div class="row row-cards">
        @forelse($posts as $post)
        <div class="col-md-6 mb-4">
              <article class="card article-card article-card-sm h-100">
                <a href="{{route('single-post',['post_id'=>$post->id])}}">
                  <div class="card-image">
                    <img loading="lazy" decoding="async" src="/images/{{$post->image}}" alt="Post Thumbnail" class="w-100">
                  </div>
                </a>
                <div class="card-body px-0 pb-0">
                  <h2>{{$post->title}}</h2>
                  <div class="content"> <a class="read-more-btn" href="{{route('single-post',['post_id'=>$post->id])}}">Read Full Article</a>
                  </div>
                </div>
              </article>
            </div>
        @empty
<span class="text-danger">No Post(s) found</span>

        @endforelse
    </div>
    
<div class="d-block.mt-2">
    {{$posts->links('livewire::simple-bootstrap')}}
</div>

</div>
