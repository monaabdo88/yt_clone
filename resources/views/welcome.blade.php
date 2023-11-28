    @extends('layouts.app')
    @section('content')


    <!-- Start Video Area -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">

            <div class="video-info">
                <div class="row">
                    <div class="col-12">
                        @if(!$channels->count())
                            <div class="alert alert-warning">
                                <p class="text-center font-bold">You are not subscribed to any channel !</p>
                            </div>
                        @else
                            @foreach ($channels as $channelVideos)
                                @foreach ($channelVideos as $video)
                                    @include('includes.video_card')
                                @endforeach
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start Video area-->

    @endsection

