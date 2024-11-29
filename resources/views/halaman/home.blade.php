@extends('layout.master')
@section('title')
Halaman Selamat Datang
@endsection

@section('content')
    <p>Nama {{$fullname}}</p>
    <p>Biodata {{$biodata}}</p>
@endsection
