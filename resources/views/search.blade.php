@extends('authLayout.layout')
@extends('layout.navbar')
@section('title', 'Search')
@section('content')


@foreach($results as $result)
<div class="card container mt-3">
  <h5 class="card-header">{{$result->name}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{$result->address}}</h5>
    <p class="card-text">Let's connect </p>
    <a href="#" class="btn btn-primary">Follow</a>
    <a href="#" class="btn btn-primary">Send a message</a>
  </div>
</div>
@endforeach


@endsection