@extends('layouts.app')

@section('content')

<br>
<div class="text-center">
    <a href="{{URL::to('index')}}" class="btn btn-danger"> Return to home</a>
</div>
<br>
<div class="text-center">
    <img style="border-radius: 100%;" class="img-fluid" src={{asset('uploads/avatar/'. $user->avatar)}} alt="">
</div>
<h3 class="text-center">{{$user->name}}</h3>


<hr>
<p>{!! $user->bio !!}</p>


<h2>Posts:</h2>
<div class="row">
    @php
        $posts = $user->posts()->orderBy('id', 'desc')->paginate(5)
    @endphp
    
    @foreach($posts as $post)
    <div class="col-md-12">
        <br>
            <div class="card-header">
                <p>{!! $post->body !!} </p>
                <p>posted: {{$post->created_at->diffForHumans()}}</p>
            </div>
            
            <br>
    </div>
    
    @endforeach

    <p style="margin-right:50%;" >{{$posts->links()}}</p>
    
    
</div>

@stop