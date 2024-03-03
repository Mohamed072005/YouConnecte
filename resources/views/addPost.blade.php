@extends('authLayout.layout')
@extends('layout.navbar')
@section('title', 'Add post')
@section('content')
<div class="container mt-5 d-flex flex-column align-items-center pb-5 bg-dark rounded">
    <div>
        <h3 class="text-light">Add Post</h3>
    </div> 
    <form action="{{route('add.post')}}" enctype="multipart/form-data" method="post" class="w-50 d-flex flex-column align-items-center mt-3 rounded shadow bg-primary w-75" style="background-color: #434242;">
        @csrf
        @method('POST')
        
        <div class="form-floating mt-3">
            <textarea name="content" class="form-control" id="areaContainer" placeholder="content" cols="37" rows="3"></textarea>
            <label for="floatingTextarea">Content</label>
        </div>
        <div class="mt-3">
            <input type="file" name="image" class="form-control" placeholder="image">
        </div>
        <div class="mt-4 mb-4">
            <button type="submit" class="btn btn-outline-dark">Done</button>
        </div>
    </form>
</div>
@endsection