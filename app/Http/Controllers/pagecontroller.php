<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

use  App\posts;

class pagecontroller extends Controller
{
    // All views
    public function index(){
        $title = "Laravel page";
        // return view('Pages.index', compact('title'));
        return view('Pages.index')->with('title',$title);
    }
    public function about(){
        $title = "About Us ";
        return view('Pages.about')->with('title',$title);
    }
    public function service(){
        // $title = "service Laravel ";
        $data = array(
            'title' => 'service ',
            'services' => ['web design', 'program', 'SEQ'] 
        );
        return view('Pages.service')->with($data);
    }

    // for test
    public function test(){
        $act1 = request('action');
        $act2 = "My request";
        return view('layout.test',['key1'=>$act1, 'key2'=>$act2]);
    }

    //print all Data base
    public function PrintALL(Request $req){
        // return $req->segments();
        $Allposts = posts::all();
        $soft_deletes = posts::onlyTrashed()->orderBY('id', 'asc')->get();
        // $Allposts = posts::paginate(5);  // print only 5 columns
        // $Allposts = posts::orderBY('id', 'desc')->paginate(5);  // print only 5 columns with best order
        return view('Display.index', ['AllPosts' => $Allposts, 'trashed'=> $soft_deletes]);
    }

    //insert data by model in form 
    public function insertData(){
        // add with check if messy and change its name
        $data = $this->validate(request(),
            [ 'title'=>'required',
              'content'=>'required', 
              'user_id'=>'required'
            ],[],
            [ 'title'=>trans('admin.title'),    
              'content'=>'Content', 
              'user_id'=>'UserID']
            );
        posts::create($data);


        session()->flash('message', 'New post succesfully insert');
        // add only 
        // $add = new posts;
        // $add->title =  Request('title');
        // $add->content= Request('content');
        // $add->save();
        return redirect('/allposts');
    }

    // delete column 
    public function DeleteColumn(){
        $del = posts::find(request('id'));
        $del->delete();
        return redirect('/allposts');
    }
    //delete checked column
    public function DeleteckeckedCol($id = null){
        // return request('id');
        if($id != null){
            $del = posts::find(request('id'));
            $del->delete();
        }
        else if( request()->has('restore') and request()->has('id')){
            posts::whereIn('id', request('id'))->restore();
        }
        else if( request()->has('force_delete') and request()->has('id')){
            posts::whereIn('id', request('id'))->forceDelete();
        }
        else if( request()->has('delete') and request()->has('id')){
            posts::destroy(request('id'));
        }
        return redirect('/allposts');
    }

    // show Api
    // public function show($id){
    //     $post = posts::find($id);
    //     return view('Display.index', ['post'=>$post]);
    // }
}