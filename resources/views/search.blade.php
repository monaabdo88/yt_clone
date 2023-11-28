@extends('layouts.app')
@section('content')
    <!-- Start Video Area -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container" style="padding-top: 20px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Search Results</h3>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-12">
                            @if ($videos->count() > 0)
                                @foreach ($videos as $video)
                                    @include('includes.video_card')
                                @endforeach
                            @else
                                <div class="alert alert-danger">
                                    <p class="text-center"><b>No Result Found</b></p>
                                </div>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start Video area-->
@endsection
