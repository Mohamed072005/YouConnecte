@extends('layout.layout')
@section('title', 'update post info')
@section('content')
<div class="container mt-5 d-flex flex-column align-items-center pb-5">
    <div>
        <h3 class="">Update Post</h3>
    </div> 
    <form action="{{ route('update.post', $editPost->id ) }}" enctype="multipart/form-data" method="post" class="w-50 d-flex flex-column align-items-center mt-3 rounded shadow" style="background-color: #efefef;">
        @csrf
        @method('PUT')
        <div>
            <input type="hidden" value="{{ $editPost->content }}" id="hiddenValue">
        </div>
        <div class="form-floating mt-3">
            <textarea name="content" class="form-control" id="areaContainer" placeholder="content" cols="37" rows="3"></textarea>
            <label for="floatingTextarea">Content</label>
        </div>
        <div class="mt-3">
            <input type="file" name="image_cover" class="form-control" placeholder="image">
        </div>
        <div class="mt-4 mb-4">
            <button type="submit" class="btn btn-outline-primary">Done</button>
        </div>
    </form>
</div>
<script>
    let hiddenValue = document.getElementById('hiddenValue').value;
    let areaContainer = document.getElementById('areaContainer');
    areaContainer.innerText = hiddenValue;
</script>
@endsection