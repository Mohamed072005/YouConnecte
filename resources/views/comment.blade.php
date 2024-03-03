@extends('layout.layout')
@section('title', 'post comments')
@section('content')
<div class="row d-flex justify-content-center mt-3 w-100">
    <div class="col-lg-9">
        <div class="mb-4 posts-container rounded">
            <div class="row posts-container border border-dark rounded">
                <div class="col-md-12 mb-3 d-flex justify-content-between">
                    <div class="ml-3 fw-bold">

                        {{ $posts->user->name }}

                        <div class="small">3 days ago</div>
                    </div>
                    <div class="d-flex justify-content-between w-75">
                        <div class="mt-2">
                            @if(session('user_id') !== $posts->user_id)
                            <form action="{{ route('store.follow') }}" method="post">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="follower_id" value="{{ $posts->user_id }}">
                                <button type="submit" class="bg-primary rounded bg-dark text-light border-light">Follow</button>
                            </form>
                            @else
                            <h5 class="text-secondary small">public</h5>
                            @endif
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Navigation-Menu-Vertical-1--Streamline-Ultimate.svg" height="20" width="20">
                                    <path fill="#999999" fill-rule="evenodd" d="M2.022 18.667A12 12 0 1 1 21.977 5.333 12 12 0 0 1 2.022 18.667Zm18.293 -1.111A10 10 0 1 0 3.685 6.444a10 10 0 0 0 16.63 11.112ZM12 10a2 2 0 1 1 0 4 2 2 0 0 1 0 -4Zm2 -3.5a2 2 0 1 0 -4 0 2 2 0 0 0 4 0Zm-2 9a2 2 0 1 1 0 4 2 2 0 0 1 0 -4Z" clip-rule="evenodd" stroke-width="1"></path>
                                </svg>
                            </button>

                            <ul class="dropdown-menu">
                                @if( session('user_id') == $posts->user_id )
                                <form action="" method="post">

                                    <button type="submit" style="background-color: transparent; border: none;">Delete</button>
                                </form>
                                <form action="" method="get">

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
                        <p class="">
                            {{ $posts->content }}
                        </p>
                    </div>

                </div>
                <div class="col-md-12 d-flex justify-content-center mb-1">
                    <img src="{{asset('storage/'.$posts->image)}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="footer posts-container rounded row mt-1 border border-dark">
                <div class="col-4 d-flex justify-content-center p-2">
                    <div class="bg-secondary w-75 rounded-pill text-center text-light">
                        <form action="{{ route('like.action', $posts->id) }}" method="post">
                            @csrf
                            <button type="submit" class="text-light" style="background-color: transparent; border: none;">{{ $postLikes }} Likes <i class="fa-regular fa-thumbs-up"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center p-2">
                    <div class="bg-secondary w-75 rounded-pill text-center"><a href="{{ route('get.comments', $posts->id) }}" class="navbar-brand text-light">commente <i class="fa-regular fa-comment"></i></a></div>
                </div>
                <div class="col-4 d-flex justify-content-center p-2">
                    <div class="bg-secondary w-75 rounded-pill text-center text-light">share <i class="fa-solid fa-share"></i></div>
                </div>
                <div class="row d-flex justify-content-center mt-3 w-100">
                    <div class="col-lg-9">
                        <div class="mb-4 posts-container rounded">
                            @forelse( $comments as $commentsInfo)
                            <div class="mb-2">
                                <div>
                                    <h4 class="">{{ $commentsInfo->user_name }}</h4>
                                </div>
                                <div class="border border-dark bg-secondary bg-gradient rounded mb-3 p-1">
                                    <p class="text-light">{{ $commentsInfo->content }}</p>

                                </div>
                            </div>
                            @empty
                            <p class="">No comments yet.</p>
                            @endforelse
                            <form action="{{ route('store.comment') }}" method="post" class="row">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                <div class="col-md-8 form-groub">
                                    <input class="form-control" id="comment" name="content" placeholder="Add your comment">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Share</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection