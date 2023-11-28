@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid bg-black">
    <div class="container">
        <h4 class="display-4" style="font-weight: bold;text-align:center;color:white">{{$channel->name}}</h1>
        <p class="lead text-center" style="color:white;">{{$channel->description}}</p>
    </div>
</div>


<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{  $channel->picture }}" class="rounded-circle mr-3" height="130px;" width="130px;">
            <div>
                <h3>{{$channel->name}}</h3>
                <p>{{ $channel->subscribers() }} Subscribers</p>
            </div>
        </div>
        <div>
            @can('update', $channel)
            <a href="{{route('channel.edit', $channel)}}" class="btn btn-primary">Edit Channel</a>
            @endcan
        </div>
    </div>

    <div>
        <div class="row my-4">
            @foreach ($channel->videos as $video)
                @include('includes.video_card')
            @endforeach
        </div>

    </div>

</div>
@endsection
