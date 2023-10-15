<?php

namespace App\Http\Livewire\Channels;

use Livewire\Component;
use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditChannel extends Component
{
    public $channel, $image, $name , $slug, $description;
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'slug' => 'required|max:255|unique:channels,slug,' . $this->channel->id,
            'description' => 'nullable|max:1000',
            'image' => 'nullable|image|max:1024',
        ];
    }
    public function mount(Channel $channel)
    {
        $this->name         = $channel->name;
        $this->slug         = $channel->slug;
        $this->description  = $channel->description;
        $this->image        = $channel->image;
        $this->channel      = $channel;
    }
    public function render()
    {
        return view('livewire.channels.edit-channel');
    }
    public function update()
    {
        $this->authorize('edit', $this->channel);
        $this->validate();

        $this->channel->update([

            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description,

        ]);
        session()->flash('message', 'Channel updated');

        return redirect()->route('channel.edit', ['channel' => $this->channel->slug]);

    }
}
