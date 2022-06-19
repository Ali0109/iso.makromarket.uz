@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($images as $image)
        <img src="{{asset('/storage/'.$image->img)}}" style="width: 50px; height: 50px;" alt="img">
        @endforeach
    </div>
@endsection
