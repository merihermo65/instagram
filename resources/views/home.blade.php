@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Publicacions') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($images as $image)
                    <div style="border-radius:5px; border: 5px solid #5e1b7b; background-color:#5e1b7bc9; border-bottom: 0;" class="card-header"> <div class="container-avatar">
                        <img src="{{ route('getavatar', ['filename'=>$image->user_id])}}" class="avatar">


                        @foreach($users as $user)
                            @if ($user->id==$image->user_id)
                                {{$user->name}} | {{'@'.$user->nick}}
                            @endif
                        @endforeach
                    
                    
                    </div> </div>
                        <div class="card-body" style="  background-color:#5e1b7b87; border-radius:5px; border: 5px solid #5e1b7b; margin-bottom: 25px;">
                            <img style="margin:10px auto;
                            padding:13px;
                            width: 786px;
                            height: 628px;
                            background-size: 100% 100%;
                            background-repeat:no-repeat;
                            background-size: cover;" src="{{route('getimagee', ['filename'=>$image->image_path])}}" >
                            
                        @foreach($users as $user)
                            @if ($user->id==$image->user_id)
                                {{\FormatTime::timeago($image->created_at)}} <br>
                                {{'@'.$user->nick}}: {{$image->description}} 
                            @endif
                        @endforeach
                        </div>
                    
                    @endforeach

                    
                </div>
                <br>
               <div style=" margin: 0 auto;"> {{ $images->links() }}</div>
               <br>


            </div>
        </div>
    </div>
</div>
@endsection
