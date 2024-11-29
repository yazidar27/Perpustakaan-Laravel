@extends('layout.master')

@section('title')
    Tambah Buku
@endsection

@section('content')
<form action="/books" method="POST" enctype="multipart/form-data">
{{-- validation --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- input form --}}
<a href="/category" class="btn btn-info btn-sm my-2">Back</a>
@csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Judul Buku</label>
        <input type="text" class="form-control" name="title" placeholder="Tulis nama buku">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Summary</label>
        <textarea name="summary" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Cover</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Stock</label>
        <input type="text" class="form-control" name="stock">
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select name="category_id" id="" class="form-control">
            <option value="">Pilih Kategori</option>
            @forelse ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
            <option value="">Kategory Masih Kosong</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection