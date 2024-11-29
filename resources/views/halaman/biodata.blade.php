@extends('layout.master')
@section('title')
    Halaman Biodata
@endsection

@section('content')
<a href="/">Kembali ke Home</a>

<form action="/welcome" method="POST">
    @csrf
    <label>Full Name</label><br>
    <input type="text" name="fullname"><br><br>
    <label>Biodata</label><br>
    <textarea name="biodata" cols="30" rows="10"></textarea><br><br>
    <button type="submit">Kirim</button>
</form>
@endSection