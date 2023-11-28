@extends('layouts.app')
@section('content')
    <!-- Start Video Area -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container" style="padding-top: 20px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>All Videos</h3>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-12">

                            @foreach ($videos as $video)
                                @include('includes.video_card')
                            @endforeach


                            <div class="pagination-area  gray-bg pb-45">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="single-wrap">
                                                {{ $videos->links('pagination::bootstrap-5')}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start Video area-->
@endsection
