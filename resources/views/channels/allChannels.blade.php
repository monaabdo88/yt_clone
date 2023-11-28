@extends('layouts.app')
@section('content')
<div class="recent-articles pt-80 pb-80">
    <div class="container">
        <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>All Channels</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @foreach ($allChannels as $channel)
                    <div class="col-12 col-md-4 col-lg-4 float-left">
                        <a href="{{ route('channel.index', $channel)}}">
                            <div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('/images/' . $channel->image)}}" height="40px"
                                            class="rounded circle">
                                        <a href="{{ route('channel.index', ['channel' => $channel]) }}">
                                       <h5 class="font-weight-bold mt-4" style="margin-left:10px">{{$channel->name}}</h5>
                                        </a>
                                        <div class="clearfix"></div>
                                        
                                    </div>

                                    <br>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
