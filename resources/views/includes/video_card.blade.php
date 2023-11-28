<div class="col-12 col-md-4 col-lg-4 float-left" style="height:400px">
    <a href="{{ route('video.watch', $video)}}">
        <div>
            @include('includes.videoThumbnail')
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <a href="{{ route('channel.index', ['channel' => $video->channel]) }}">

                        <img src="{{asset('/images/' . $video->channel->image)}}" height="40px"
                        class="rounded circle">
                    </a>
                    <h5 class="font-weight-bold mt-4" style="margin-left:10px">{{$video->title}}</h5>

                </div>
                <!--<p class="text-gray mt-4 font-weight-bold" style="line-height: 0.2px;">{{ $video->channel->name}}
                </p>-->
                <br>
                <p class="text-gray font-weight-bold" style="line-height: 0.2px">{{ $video->views}} views •
                    {{$video->created_at->diffForHumans()}}</p>
            </div>
        </div>
    </a>

</div>
