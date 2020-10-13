@extends('layout.app')

@section('title', 'Home')   

@section('content')
    
    <h1>welcome in our {{$title}}</h1>
    <p>This is about pages</p>
    
    <div class="row">
        <div class="column">
           
        </div>

        <div class="column">
            <p>Add title and Content</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{url('insert/posts')}}">
                <input type="hidden" , name="_token" value="{{csrf_token()}}">
                <input type="text" name="title" value="{{old('title')}}" placeholder="title"> <br>
                <input type="text" name="user_id" value="{{old('user_id')}}" placeholder="user_id"> <br>
                <input type="text" name="content" value="{{old('content')}}" placeholder="content"> <br>
                <input type="submit" value="Add">
            </form>
        </div>
    </div>
    
    
        <button class="butlog"><a href="/login">Login</a> </button>
        <button class="butreg"><a href="/register">Register</a></button>
        
        <br>
        <div class="Postsdiv">
            <a href={{ route('allposts') }}>Print all Posts</a>
        </div>
        
        @endsection
        