@extends('layout')
@section('title', 'Contoh Halaman Blade')
@section('header', 'Ini Halaman Contoh')
@section('content')
<h1>{{ $title }}</h1>
@if($ifLogin)
<p>Ini Bener Login</p>
@else
<p>Ini Tidak Login</p>
 <ol>
    @foereach($products as $value)
    <li>{{ $value }}</li>
    @endforeach
 </ol>
@endif
<x-alert>
    <p>Ini Konten Alert </p>
</x-alert>
@endsection
