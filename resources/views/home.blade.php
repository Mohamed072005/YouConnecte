@extends('layout.layout')
@section('content')
@foreach($posts as $postInfo)
<div class="search-container d-flex justify-content-center w-75 row rounded mt-3">
    <div class="col-md-3 d-flex align-items-center justify-content-center p-2">
        <img src="{{ asset('storage/image.png') }}" style="width: 70px; height: 70px;" class="rounded-circle img-fluid" alt="user_img">
    </div>
    <div class="col-md-9 d-flex align-items-center">
        <form class="search-form w-100 d-flex justify-content-center" role="search">
            <input class="search-input form-control rounded-pill me-2 w-100 " type="search" placeholder="What's in your mind {{ session('user_name') }}?" id="searchinput">
            <!-- <button class="btn btn-outline-warning">Search</button> -->
        </form>
    </div>
</div>
<div class="row d-flex justify-content-center mt-1 w-100">
    <div class="col-lg-9">
        <div class="mb-4 posts-container rounded">
            <div class="row posts-container border border-dark rounded">
                <div class="col-md-12 mb-3 d-flex justify-content-between">
                    <div class="text-light ml-3">
                        {{ $postInfo->name}}
                        <div class=" text-light small">3 days ago</div>
                    </div>
                    <div class="mr-1">

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Navigation-Menu-Vertical-1--Streamline-Ultimate.svg" height="20" width="20">
                                    <path fill="#ffffff" fill-rule="evenodd" d="M2.022 18.667A12 12 0 1 1 21.977 5.333 12 12 0 0 1 2.022 18.667Zm18.293 -1.111A10 10 0 1 0 3.685 6.444a10 10 0 0 0 16.63 11.112ZM12 10a2 2 0 1 1 0 4 2 2 0 0 1 0 -4Zm2 -3.5a2 2 0 1 0 -4 0 2 2 0 0 0 4 0Zm-2 9a2 2 0 1 1 0 4 2 2 0 0 1 0 -4Z" clip-rule="evenodd" stroke-width="1"></path>
                                </svg> -->
                            </button>

                            <ul class="dropdown-menu">
                                @if(session('user_id') == $postInfo->user_id)
                                <form action="{{ route('delete.post', $postInfo->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: transparent; border: none;">Delete</button>
                                </form>
                                <form action="{{ route('edit.post', $postInfo->id) }}" method="get">
                                    @csrf
                                    @method('Edit')
                                    <button type="submit" style="background-color: transparent; border: none;">Update</button>
                                </form>
                                @else
                                <li><a class="dropdown-item" href="#">action</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-start mt-2">
                    <div class="w-100">
                        <p class="text-light">
                            {{ $postInfo->content}}
                        </p>
                    </div>

                </div>
                <div class="col-md-12 d-flex justify-content-center mb-1">
                    <img src="{{asset('storage/'.$postInfo->image)}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="footer posts-container rounded row mt-1 border border-dark">
                <div class="col-4 d-flex justify-content-center p-2">
                    <div class="bg-secondary w-75 rounded-pill text-center text-light">like</div>
                </div>
                <div class="col-4 d-flex justify-content-center p-2">
                    <div class="bg-secondary w-75 rounded-pill text-center"><a href="" class="navbar-brand text-light">commente</a></div>
                </div>
                <div class="col-4 d-flex justify-content-center p-2">
                    <div class="bg-secondary w-75 rounded-pill text-center text-light">share</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection