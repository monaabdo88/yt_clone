<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
class ChannelController extends Controller
{
    //edit form for user,s channel
    public function edit(Channel $channel)
    {
        return view('channels.edit', compact('channel'));
    }
}
