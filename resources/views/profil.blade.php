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
                <p class="fw-bold fs-5 text-light">Welecome to you profil</p>
            </div>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-regular fa-user text-light mt-1"></i>
            <p class="mb-2 fw-semibold text-light ">Name of user</p>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-regular fa-envelope text-light mt-1"></i>
            <p class="mb-2 fw-semibold text-light ">Email: </p>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-solid fa-house text-light mt-1"></i>
            <p class="mb-2 fw-semibold text-light ">Address: </p>
        </div>
        <div class="d-flex gap-4 h-50">
            <i class="fa-solid fa-phone text-light mt-1"></i>
            <p class="mb-2 fw-semibold text-light ">Phone: </p>
        </div>
    </section>
    <section class="bg-dark w-50">
        <p>yey</p>
    </section>
    <section class="bg-success w-25">
    <p>yeey</p>
    </section>


</section>




@endsection