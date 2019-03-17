@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class=" col-md-7">
                @if($user->avatar == 'default.jpg')
                <img src="uploads/default.jpg" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" alt="">
                @else
                <img src="uploads/avatar/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" alt="">
                @endif
                <h2>{{$user->name}}'s Profile</h2>
                <div class="form-group">
                    <form  enctype="multipart/form-data" action="{{URL::to('profile')}}" method="POST">
                        <label>Update profile image</label>
                        <br>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
                        <button type="submit" class="btn btn-success" style="float: right;">Change profile</button>
                    </form>
                </div>
                <div class="form-group">
                    {!! Form::open(['route' => ['profile.destroy', $user->id], 'method' => 'DELETE']) !!}
                        <button   style="float:right; margin: 5px;" type="submit" class="btn btn-danger">Delete</button>
                    {!! Form::close() !!}
                    <a class="btn btn-primary" href="{{ route('profile.edit', ['id' => $user->id]) }}">Edit</a>
                </div>
                    
                
                

                
            </div>
            <div class="col-md-7">
                
            </div>
        </div>
    </div>
@stop

