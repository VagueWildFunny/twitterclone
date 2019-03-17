@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 100px;">
    <div class="col-md-6">    
        {!! Form::open(['route' => ['profile.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}

        {!! Form::label('USERNAME', null, ['class' => 'control-label']) !!}
        {!! Form::text('slug', $user->slug, ['class' => 'form-control', 'autocomplete' => 'off']); !!}
        <br>

        {!! Form::label('Display Name', null, ['class' => 'control-label']) !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control',  'autocomplete' => 'off']); !!}



     
        <br>

        <button type="submit" class="btn btn-success">Edit Profile</button> 
        {!! Form::close() !!}
        <a href="{{URL::to('profile')}}"><button style="position:absolute; margin-top: -37px; margin-left: 100px;" type="submit"  class="btn btn-primary">Return to Profile</button></a> 
        
    </div>
</div>



@stop


