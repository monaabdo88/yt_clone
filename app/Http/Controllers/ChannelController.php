<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChannelController extends Controller
{
    use AuthorizesRequests;
    //edit form for user,s channel
    public function index(Channel $channel)
    {

        return view('channels.index', compact('channel'));
    }
    public function edit(Channel $channel)
    {
        $this->authorize('update', $channel);
        return view('channels.edit', compact('channel'));
    }
}
