<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Image;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function penja(Request $request)
{

        return view('penja')->with(['a'=>""]);
}
public function penjaimg(Request $request)
{
    $user=\Auth::user();
    $id =\Auth::user()->id;
    $new= new Image();
    

    $description=$request->input('description');
    $image = $request->file('image');

    $validate=$this->validate($request,[
        'description'=>['required','string','max:255'],
    ]);
   if ($image){
            $path=$image->store('img');
            $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
            $new->image_path=$filename;
            $new->description=$description;
            $new->user_id=$id;
        }
        
    $new->save();
    return view('penja')->with(['a'=>"S'ha publicat correctament"]);

}



}
