@extends('layout.master')

@section('title')
    Data View
@endsection

@section('content')
    <a href="/category/create" class="btn btn-info btn-sm my-2">Add</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$item->name}}</td>
                <td>
                    <form action="/category/{{$item->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="/category/{{$item->id}}" class="btn btn-info btn-sm">Detail</a> 
                        <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a> 
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                
              </tr>
            @empty
                <tr>
                    <td>Data masih kosong</td>
                </tr>
            @endforelse
        </tbody>
      </table>
@endsection