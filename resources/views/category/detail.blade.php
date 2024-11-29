@extends('layout.master')

@section('title')
    Detail
@endsection

@section('content')
    <a href="/category" class="btn btn-info btn-sm my-2">Back</a>
    <h1>{{$category->name}}</h1>

    <h4>List Buku</h4>
    <div class="row d-flex flex-wrap">
        @forelse ($category->listBooks as $item)
        <div class="col-sm-6 col-md-4 mb-3 d-flex align-items-stretch">
            <div class="card h-100">
                <img src="{{asset('uploads/'.$item->image)}}" class="card-img-top img-fluid w-100" alt="...">
                <div class="card-body">
                    <h2>{{$item->title}}</h2>
                    <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                    <a href="/books/{{$item->id}}" class="btn btn-primary btn-block">Read More</a>
                </div>
            </div>
        </div>
        @empty
            <h5>Tidak Ada Buku di Kategori ini</h5>
        @endforelse
    </div>
@endsection