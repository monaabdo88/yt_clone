<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;
use App\Models\Video;
use App\Models\Channel;
class EditVideo extends Component
{
    public Channel $channel;
    public $title, $description, $visibility;
    public Video $video;
    protected $rules = [
        'title' => 'required|max:255',
        'description' => 'nullable|max:1000',
        'visibility' => 'required|in:private,public,unlisted',
    ];
    public function mount($channel, $video)
    {
        $this->channel = $channel;
        $this->video = $video;
        $this->title = $video->title;
        $this->description = $video->description;
        $this->visibility = $video->visibility;

    }
    public function render()
    {
        return view('livewire.video.edit-video')
            ->extends('layouts.app');;
    }

    public function update()
    {
        $this->validate();
        //update video record
        $this->video->update([
            'title' => $this->title,
            'description' => $this->description,
            'visibility' => $this->visibility
        ]);

        session()->flash('message', 'video was update ');
    }
}
