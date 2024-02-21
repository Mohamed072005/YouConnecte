@extends('authLayout.layout')
@extends('layout.navbar')
@section('title', 'My Profil')
@section('content')

<!-- <h1>Profil page</h1> -->


<section  class="d-flex justify-content-between mt-2">

    <section class="ms-3 w-25 h-100">
        <div class="w-100   d-flex justify-content-evenly">
            <div class="w-25">
                <img  class="figure-img img-fluid rounded-circle w-50 "src="{{URL('assets/person1.jpg')}}" alt="">
            </div>
            <div class="w-75">
                <p class="fw-bold fs-5 text-dark">Welecome to you profil</p>
            </div>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-regular fa-user text-dark mt-1"></i>
            <p class="mb-2 fw-semibold text-dark ">Name of user: {{$mypostsinfo[0]->name}}</p>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-regular fa-envelope text-dark mt-1"></i>
            <p class="mb-2 fw-semibold text-dark">Email: {{$mypostsinfo[0]->email}}</p>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-solid fa-house text-dark mt-1"></i>
            <p class="mb-2 fw-semibold text-dark ">Address: {{$mypostsinfo[0]->address}}</p>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-solid fa-phone text-dark mt-1"></i>
            <p class="mb-2 fw-semibold text-dark ">Phone: {{$mypostsinfo[0]->phone}}</p>
        </div>
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$mypostsinfo[0]->id}}">
            Update
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$mypostsinfo[0]->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form action="{{route ('profil.update', $mypostsinfo[0]->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label  class="form-label">User name</label>
                                    <input type="text" name="name" value="{{$mypostsinfo[0]->name}}" class="form-control" >
                                </div>
                                <div>
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" value="{{$mypostsinfo[0]->email}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div>
                                    <label  class="form-label">Address</label>
                                    <input type="text" name="address" value="{{$mypostsinfo[0]->address}}" class="form-control">
                                </div>
                                <div>
                                    <label  class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$mypostsinfo[0]->phone}}">
                                </div>                    
                                <button  type="submit" name="submit" class="btn btn-primary">Submit</button>

                                </form>
                        </div>
               
                </div>
            </div>
        


        </div>




    </section>
    <section class=" w-50">
        @foreach($mypostsinfo as $mine)
    <div class="row d-flex justify-content-center mt-1 w-100  rounded">
    <div class="col-lg-9">
        <div class="mb-4 posts-container rounded border border-0 ">
            <div class="row posts-container border border-dark rounded ">
                <div class="col-md-12 mb-3 d-flex justify-content-start">
                    <div class="text-dark ml-3 fw-bold">
                        {{session('user_name')}}
                        <div class=" text-secondary small ">5days agao</div>
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-start mt-2">
                    <p class="text-dark">
                    {{$mine->content}}
                    </p>
                </div>
                <div class="col-md-12 d-flex justify-content-center mb-1">
                    <img src="{{asset('storage/'.$mine->image)}}" class="img-fluid" alt="">
                </div>
                <div class="d-flex gap-5">
                    <button class="btn btn-secondary ms-4 my-3">Likes <i class="fa-regular fa-thumbs-up"></i></button>
                    <button class="btn btn-secondary my-3">Comments <i class="fa-regular fa-comment"></i></button>
                    <button class="btn btn-secondary my-3">share <i class="fa-solid fa-share"></i></button>


                </div>
            </div>
            <div class="footer posts-container border border-dark rounded">
            </div>

        </div>
    </div>
   
</div>
@endforeach

</section>
    <section class="bg-secondary w-25 h-100">
    <h3 class="border-bottom text-light text-center">Friends suggestions</h3>
    @foreach($users as $user)
    <div class="border-bottom d-flex" >
    <i class="fa-solid fa-circle text-success mx-3 my-2"></i>
    <a href="" class= "text-light mt-1 text-decoration-none hover-me" id="users">{{$user->name}}</a>
    </div>
    @endforeach

    </section>


</section>






@endsection