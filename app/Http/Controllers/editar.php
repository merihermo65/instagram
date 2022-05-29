<?php

namespace App\Http\Controllers;
//namespace App\Http\Requests;
use Illuminate\Http\Response;

use App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


use Illuminate\Http\Request;

class editar extends Controller
{
    public function index(Request $request)
{
    return view('edita')->with(['a'=>""]);
}
    
    public function update(Request $request)
{
    $user=\Auth::user();
    $id =\Auth::user()->id;
    
    
    
    $name=$request->input('name');
    $surname=$request->input('surname');
    $nick=$request->input('nick');
    $email=$request->input('email');
    $image_path = $request->file('image');

    $validate=$this->validate($request,[
        'name'=>['required','string','max:255'],
        'surname'=>['required','string','max:255'],
        'nick'=>'required|string|max:255|unique:users,nick,'.$id,
        'email'=>'required|string|max:255|unique:users,email,'.$id,
    ]);


    $user->name=$name;
    $user->surname=$surname;
    $user->nick=$nick;
    $user->email=$email;

    if ($image_path){
            $path=$image_path->store('users');
            $filename = preg_replace('/^.+[\\\\\\/]/', '', $path);
            $user->image=$filename;
        }

    $user->update();
    return view('edita')->with(['a'=>"S'ha editat correctament"]);

}
    public function updatepass(Request $request)
    {   
        $user=\Auth::user();
        $id =\Auth::user()->id;
        
        $password=$request->input('password');
    if ($password){ 

        $validate=$this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    
    
        $user->password=Hash::make($password);

    
        $user->update();
        return view('editpass')->with(['a'=>"S'ha editat correctament"]);}
        else{
            return view('editpass')->with(['a'=>""]);
        };
    
        
        
        
        //return view('editpass')->with(['a'=>""]);
    }
    public function getimage($filename)
    {
        $file=Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
}