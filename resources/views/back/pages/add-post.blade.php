@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Add Post')
@section('content')

<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Add New Post
                </h2>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('author.posts.create') }}" method="post" id="addPostForm" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="col-md-10">
                <div class="mb-4">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                    <span class="text-danger error-text title_error"></span>
                </div>

                <div class="mb-4">
                    <label class="form-label">Content <span class="form-label-description"></span></label>
                    <textarea class="form-control" name="content" rows="6" placeholder="Content.."></textarea>
                    <span class="text-danger error-text content_error"></span>
                </div>
                <div class="mb-4">
                    <div class="form-label">Thumbnail</div>
                    <input type="file" class="form-control" name="img">
                    <span class="text-danger error-text img_error"></span>
                </div>
                <div class="image_holder mb-2" style="max-width: 250px;">
                    <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img=''>
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Send Post</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

