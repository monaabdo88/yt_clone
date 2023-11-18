<?php

namespace App\Http\Livewire\Channels;

use Livewire\Component;
use App\Models\Channel;
use Auth;
use App\Models\Subscription;
class ChannelInfo extends Component
{
    public $channel;
    public $userSubscribed = false;

    public function mount(channel $channel)
    {
        $this->channel = $channel;
        if(Auth::check())
        {
            if(auth()->user()->isSubscribedTo($this->channel))
            {
                $this->userSubscribed = true;
            }
        }
    }
    public function render()
    {
        return view('livewire.channels.channel-info')->extends('layouts.app');
    }
    public function toggle()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (auth()->user()->isSubscribedTo($this->channel)) {
            Subscription::where('user_id', auth()->id())->where('channel_id', $this->channel->id)->delete();
            $this->userSubscribed = false;
        } else {
            Subscription::create([
                'user_id' => auth()->id(),
                'channel_id' => $this->channel->id
            ]);
            $this->userSubscribed = true;
        }
    }
}
