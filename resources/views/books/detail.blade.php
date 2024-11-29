@extends('layout.master')

@section('title')
    Detail Buku
@endsection

@section('content')
    <a href="/books" class="btn btn-secondary btn-sm my-2">Back</a>

    <img src="{{asset('uploads/'.$books->image)}}" class="img-thumbnail rounded mx-auto d-block" alt="">
    <h1 class="text-primary">{{$books->title}}</h1>
    <p>{{$books->summary}}</p>
@endsection