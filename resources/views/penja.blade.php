@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PENJAR IMATGES') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('imgnovaa') }}" role="form" enctype="multipart/form-data" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Imatge') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/png, image/jpeg, image/PNG," class="form-control"  name="image" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"  class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6" >
                                <textarea style="height: 75px;width: 340px;" id="description" type="text" class="form-control" name="description">
                                </textarea></div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Penjar') }}
                                </button>
                                <p>{{$a}}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection