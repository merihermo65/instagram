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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(2);
        $users = User::all();
        
        
        return view('home',compact('images'))->with('images', $images)->with('users', $users);
    }

    public function getimagee($filename)
    {
        $file=Storage::disk('img')->get($filename);
        return new Response($file,200);
    }

    public function getavatar($id)
    {
        $users= User::all();

        foreach($users as $user){
            if($id==$user->id){
                $filename=$user->image;
                $nom=$user->name;
                $nick=$user->nick;
            }
        };
        
        $file=Storage::disk('users')->get($filename);
        return new Response($file,200);
    }


    
}
