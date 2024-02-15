@extends('layout.layout')
@section('content')
@foreach($posts as $postInfo)
<div class="row d-flex justify-content-center mt-1 w-100">
    <div class="col-lg-9">
        <div class="mb-4 posts-container rounded">
            <div class="row posts-container border border-dark rounded">
                <div class="col-md-12 mb-3 d-flex justify-content-start">
                    <div class="text-light ml-3">
                        {{ $postInfo->name}}
                        <div class=" text-light small">3 days ago</div>
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-start mt-2">
                    <p class="text-light bg-danger">
                    {{ $postInfo->content}}
                    </p>
                </div>
                <div class="col-md-12 d-flex justify-content-center mb-1">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="footer posts-container border border-dark rounded">
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection