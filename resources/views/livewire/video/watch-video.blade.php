<div>
    @push('custom-css')
    <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />
    @endpush
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="video-container" wire:ignore>
                        <video controls preload="auto" id="yt-video"
                            class="video-js vjs-fill vjs-styles=defaults vjs-big-play-centered" poster="{{ asset('videos/'. $video->uid . '/' . $video->thumbnail_image)}}" data-setup="{}">
                            <source src="{{ asset('videos/'. $video->uid . '/' . $video->proccessed_file)}}"
                                type="application/x-mpegURL" />
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                            </p>
                        </video>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h3 class="mt-4">{{$video->title}}</h3>
                                <p class="gray-text">{{$video->views}} views . {{$video->uploaded_date}}</p>
                            </div>
                            <div>
                                <livewire:video.voting :video="$video" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <livewire:channels.channel-info :channel="$video->channel" />
                    </div>
                </div>
            </div>
            <hr>

            <h4>{{$video->AllCommentsCount()}} Comment</h4>
            @auth
                <div class="my-2">
                    <livewire:comment.new-comment :video="$video" :col=0 :key="$video->id " />
                </div>
            @endauth
                <livewire:comment.all-comments :video="$video" />
        </div>

        @push('scripts')
        <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>

        <script>
           /* var player = videojs('yt-video')
            player.on('timeupdate', function() {
            
               if (this.currentTime() > 3)  {
                   this.off('timeupdate')
                   Livewire.dispatch('VideoViewed')
                   
               }
            })*/
           
        </script>
        <script>
            var player = videojs('yt-video')
            var countedAsView = false;
            player.on('timeupdate', function() {
                if (!countedAsView && this.currentTime() > 3) {
                    countedAsView = true;
                    // this.off('timeupdate') // No longer neccessary
                    Livewire.dispatch('VideoViewed')
                }
            })
        </script>
        @endpush
    </div>