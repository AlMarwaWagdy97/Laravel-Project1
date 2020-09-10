 {{-- <hr> --}}
 <center>Trashed</center>


 <table border="1" >
     <tr>
         <th>cheked</th>
         <th>id</th>
         <th>Title</th>
         <th>Content</th>
         <th>User ID</th>
     </tr>
     <form method="post" action="{{url('delitems/posts')}}">
         @foreach ($trashed as $item)
             <tr>
                 <td>
                     <input type="hidden", name="_token", value="{{csrf_token()}}">
                     <input type="hidden" name="_method" value="DELETE">
                     <input type="checkbox" name="id[]" value="{{$item->id}}">
                 </td>
                 <td>{{$item->id}}</td>
                 <td>{{$item->title}}</td>
                 <td>{{$item->content}}</td>
                 <td>{{$item->user_id}}</td>
             </tr>
         @endforeach
         <input type="submit" name="restore" value="Restore">
         <input type="submit" name="force_delete" value="Force Delete">
     </form>
</table>
</div>     