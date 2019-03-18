@extends('layouts.app')

@section('content')
<br>
    <div class="container">
        {{-- <div class="row">
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
                   
                    <a class="btn btn-primary" href="{{ route('profile.edit', ['id' => $user->id]) }}">Edit</a>
                </div>    
            </div>
        </div> --}}
        <div class="row">
            
            <div class="col-md-12">
                
                @if($user->avatar == 'default.jpg')
                <img src="uploads/default.jpg" class="img-fluid" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" alt="">
                @else
                <img src="uploads/avatar/{{$user->avatar}}" class="img-fluid" style=" float:left; width: 150px; height: 150px; border-radius: 100%;" alt="">
                @endif
                <h2 style="width: 100%;">{{$user->name}}'s Profile</h2>
                <form  enctype="multipart/form-data" action="{{URL::to('profile')}}" method="POST">
                    <br>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success">Change picture</button>
                </form>
            </div>
            <br>

        </div>
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-6">

                {!! Form::open(['route' => ['profile.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
        
    
                    {!! Form::label('Display Name', null, ['class' => 'control-label']) !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control',  'autocomplete' => 'off']); !!}
                    <br>
                    {!! Form::label('bio', null, ['class' => 'control-label']) !!}
                    {!! Form::text('bio', $user->bio, ['id'=>'mytextarea'], ['class' => 'form-control',  'autocomplete' => 'off']); !!}
                    <br>
                    <button type="submit" class="btn btn-success">Edit Profile</button> 
                {!! Form::close() !!}

                {!! Form::open(['route' => ['profile.destroy', $user->id], 'method' => 'DELETE']) !!}
                <button style="float:left;" type="submit" class="btn btn-danger">Delete Account</button>
                {!! Form::close() !!}

                <a href="profile/{{$user->slug}}/"><button  type="submit"  class="btn btn-primary">Return to Profile</button></a> 
                
            </div>
            <div class="col-md-6">
                <br>
                <br>
                <br>
                <br>
   
        
                    {!! Form::open(['route' => 'post.store', 'method' => 'POST', 'files' => true]) !!}
            
        
                        {!! Form::label('Post', null, ['class' => 'control-label']) !!}
                        {!! Form::text('body', null, ['id'=>'postarea'], ['class' => 'form-control',  'autocomplete' => 'off']); !!}
                        <br>
    
                        <button type="submit" class="btn btn-success">add post</button> 
                    {!! Form::close() !!}
    
                </div>
        </div>
        <br>
        <div class="row">
            
        </div>
    </div>


@stop

