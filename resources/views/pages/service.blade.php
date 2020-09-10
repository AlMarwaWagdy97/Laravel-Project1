@extends('layout.app')

@section('title', 'Service')   

@section('content')
    <h1>{{$title}}</h1>
    <p>This is service pages</p>
    @if(count($services) >0)
        <ul class="list-group">
            @foreach ($services as $item)
                <li class="list-group-item">{{$item}}</li>
            @endforeach
        </ul>
    @endif
    @endsection

@section('title', 'Home')   