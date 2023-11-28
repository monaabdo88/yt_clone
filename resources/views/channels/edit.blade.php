@extends('layouts.app')

@section('content')
<div class="container" style="margin: 50px auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Edit Channel').' '.Auth::user()->channel->name }}</div>

                <div class="card-body">
                    <livewire:channels.edit-channel :channel="$channel" />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
