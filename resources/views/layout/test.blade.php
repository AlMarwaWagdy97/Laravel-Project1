
<h1>
    {{$key1}} - {{$key2}}
    
</h1>

<form method="post" action="{{url('/test')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="foo">
    <input type="submit" name="send" value="send data">
</form>

