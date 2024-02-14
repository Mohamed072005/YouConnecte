@extends('layout.layout')
@section('content')
<li class="text-light list-group-item"><h3>{{ session('user_first_name') }}</h3></li>
@endsection