{{Request::segment('1')}}
{{-- @extends('Display.index')
@section('Display_content') --}}
    <center>Data</center>
    <div class ='outdata'>
        <table border="1">
                <tr>
                    <th>cheked</th>
                    <th>id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>User ID</th>
                    <th>User name</th>
                </tr>
                <form method="post" action="{{url('delitems/posts')}}">
                    @foreach ($AllPosts as $item)
                        <tr>
                            <td>
                                <input type="hidden", name="_token", value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="checkbox" name="id[]" value="{{$item->id}}">
                            </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->content}}</td>
                            <td>{{(string)$item->user_id()->first()->id}}</td>
                            <td>{{(string)$item->User->name}}</td>
                            {{-- <td>{{(string)$item->user_id()->first()}}</td> --}}
                            {{-- <td>
                                <form method="post" action="{{url('del/posts/'.$item->id)}}">
                                    <input type="hidden", name="_token", value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit", value="Delete">
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                    <input type="submit" name="delete" value="Delete checked">
                    <input type="submit" name="force_delete" value="Force Delete">


                </form>
        </table>

 
        @include('Display.message')

        @include('layout.PrintTrashed')

       
        
{{-- @endsection --}}
