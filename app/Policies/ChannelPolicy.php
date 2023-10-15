<?php

namespace App\Policies;

use App\Models\Channel;
use App\Models\User;

class ChannelPolicy
{
    public function edit(User $user , Channel $channel)
    {
        return $user->id == $channel->user_id;
    }
}
