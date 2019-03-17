@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center" >
            <span style="font-family:fantasy; font-size:30px;"><span style="color: orange; font-weight: bold;" >Featured</span> Users</span>
        </div>
    </div>
    <div class="row">
        
        @foreach($users as $user)
        <div class="col-md-4">
            <br>
            <div class="card" style="width: 22rem;">
                @if($user->avatar == 'default.jpg')
                <img class="card-img-top"  src={{asset('uploads/default.jpg')}} alt="{{@$user->name}}">
                @else 
                    <img class="card-img-top"  src={{asset('uploads/avatar/'. @$user->avatar)}} alt="{{@$user->name}}">
                @endif
                <div class="card-body">
                    <a href="profile/{{@$user->slug}}/">{{@$user->name}}</a>
                    <p> Member since: {{@$user->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
     
</div>
@stop

    
    
  

    
