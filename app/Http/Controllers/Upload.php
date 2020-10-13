<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;     

class Upload extends Controller
{
    public function upload(){
        // return dd(request()->hasFile'file'));
        $this->validate(request(), ['file.*' => 'required|image|mimes:jpg,jpeg,png']);

        $files = request()->file('file');
        foreach($files as $file) {
            $name = $file->getClientOriginalName();         //return file name: 'degree.jpg'
            $ext  = $file->getClientOriginalExtension();    // return type :jpg
            $size = $file->getSize();                       // return size of image : 3533
            $mim = $file->getMimeType();   
            $realpath = $file->getRealPath();                 // return name/type :degree/jpg
            $file->move(public_path('Uploads'),$name. time().'.'.$ext); 
        }
        return  back();
    }
    

    public function textarea(){
        Storage::disk('local')->put('text_file.txt', request('text'));
        return request('text');    
    }
    
}