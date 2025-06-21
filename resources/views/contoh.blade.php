<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh</title>
</head>
<body>
    <h1></h1>{{ $title }}</h1>
    <ol>
    @foreach($products as $value)
    <li>{{ $value }}</li>
    @endforeach
    </ol>
</body>
</html> -->
@extends('layout')
@section('title', 'Contoh Halaman Blade')
@section('content')
 <h1>{{ $title }}</h1>
 <ol>
    @foreach($products as $value)
    <li>{{ $value }}</li>
    @endforeach
 </ol>
 @endsection