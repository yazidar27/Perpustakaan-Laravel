@extends('layout.master')

@section('title')
    Daftar Buku
@endsection

@section('content')
@auth
    <a href="/books/create" class="btn btn-primary btn-sm my-2">Add</a>
@endauth
    
    <div class="row">
        @forelse ($books as $item)
        <div class="col-4">
            <div class="card h-100">
                <img src="{{asset('uploads/'.$item->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h2>{{$item->title}}</h2>
                <span class="badge badge-success">{{$item->category->name}}</span>
                    <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                    <a href="/books/{{$item->id}}" class="btn btn-primary btn-block">Read More</a>
                    @auth
                    <div class="row my-2">
                    <div class="col">
                        <a href="/books/{{$item->id}}/edit" class="btn btn-info btn-block">Edit</a>
                    </div>
                    <div class="col">
                        <form action="/books/{{$item->id}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <input type="submit" class="btn btn-danger btn-block" value="Delete">
                        </form>
                    </div>
                    </div>
                    @endauth
                    </div>
                </div>
        </div>
        @empty
            <h1>Halaman Kosong</h1>
        @endforelse
        
    </div>
@endsection