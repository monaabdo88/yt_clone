<?php

namespace App\Http\Livewire\Channels;

use Livewire\Component;
use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
//use Nette\Utils\Image;
use Intervention\Image\Facades\Image;
class EditChannel extends Component
{
    use AuthorizesRequests, WithFileUploads;
    public $channel, $image, $name , $slug, $description;
    public function rules()
    {
        return [
            'name'          => 'required|max:255|unique:channels,name,' . $this->channel->id,
            'slug'          => 'required|max:255|unique:channels,slug,' . $this->channel->id,
            'description'   => 'nullable|max:1000',
            'image'         => 'nullable|image|max:1024',
        ];
    }
    public function mount(Channel $channel)
    {
        $this->name         = $channel->name;
        $this->slug         = $channel->slug;
        $this->description  = $channel->description;
        $this->image        = $channel->image;
        $this->channel      = $channel;
        //$this->image = Storage::get('images' . $channel->image);


    }
    public function render()
    {
        return view('livewire.channels.edit-channel');
    }
    public function update()
    {
        $this->authorize('update', $this->channel);
        $this->validate();

        $this->channel->update([

            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image'     => $this->image

        ]);
        //check if image isset
        if($this->image)
        {
            //upload image
            $image = $this->image->storeAs('images',$this->channel->uid.'.png');
            $newImg = explode('/',$image)[1];
            //resize & convert &save image
            $img = Image::make(storage_path().'/app/'.$image)
            ->encode('png')
            ->fit(80,80,function($constraint){
                $constraint->upsize();
            })->save();
            //update image in database
            $this->channel->update(['image' => $newImg]);
        }
        session()->flash('message', 'Channel updated');

        return redirect()->route('channel.edit', ['channel' => $this->channel->slug]);

    }
}
