<div>
    <div class="container" style="margin: 50px auto">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($videos->count())
                    @foreach($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="{{route('video.watch', $video)}}">
                                        <img src="{{asset($video->thumbnail)}}" class="img-thumbnail" alt="">
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <h5>{{$video->title}}</h5>
                                    <p class="text-truncate">{{$video->description}}</p>
                                </div>
                                <div class="col-md-2">
                                    {{$video->visibility}}
                                </div>
                                <div class="col-md-2">
                                    {{$video->created_at->format('d/m/Y')}}
                                </div>
                                @if(Auth::user()->owns($video))
                                    <div class="col-md-2">
                                        <a style="background-color:#ff2143;padding:15px;" href="{{ route('video.edit' , ['channel'=> auth()->user()->channel, 'video' => $video->uid])}}"><i class="ti-pencil"></i></a>
                                        <a style="background-color:#ff2143;padding:15px;color:white" wire:click.prevent="delete('{{$video->uid}}')"><i class="ti-trash"></i></a>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="alert alert-warning"><p class="text-center">No Videos Uploaded</p></div>
                @endif
            </div>
            {{ $videos->links()}}
        </div>
    </div>
</div>
