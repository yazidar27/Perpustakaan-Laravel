@extends('layout.master')

@section('title')
    Tambah Category
@endsection

@section('content')
<form action="/category" method="POST">
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
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" class="form-control" name="name" placeholder="Tulis Genre buku">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection