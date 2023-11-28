<div class="my-5">
    <div class="d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center">
            <img src="{{ asset('/images/' . $channel->image)}}" class="rounded-circle img-responsive img-thumbnail" height="100" width="100">
            <div class="ml-2">
                <h4> {{$channel->name}}</h4>
                <p class="gray-text text-sm">{{$channel->subscribers()}} subscribers</p>
            </div>
        </div>

        <div>
            <button wire:click.prevent="toggle"
                class="btn btn-lg text-uppercase {{$userSubscribed ? 'btn-danger' : 'btn-primary'}} ">
                {{$userSubscribed ? 'Subscribed' : 'Subscribe'}}
            </button>
        </div>
    </div>
</div>