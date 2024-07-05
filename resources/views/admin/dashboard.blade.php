@extends('layouts.app')
@section('content')
    <form action="{{ route('logout')}}" method="post">
        @csrf
        @method('post')
        <button class="btn btn-success">Logout</button>
    </form>
@endsection