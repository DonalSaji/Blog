@extends('front.layouts.pages-layout')
@section('pageTitle',isset($pageTitle)?$pageTitle:'Bloges')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    {!!$post->title!!}
                </h2>
                <img src="/images/{{$post->image}}" alt="" class="card-img-top" style="width: 30%; height: 30%;">
                <p style="font-size: 22px; font-family:sans-serif;"><br><br>{!!$post->content!!}</p>
                <div class="content"> <a class="read-more-btn" href="{{route('home')}}">Back to All Articles</a>
                  </div>
            </div>

        </div>
    </div>
</div>
@endsection