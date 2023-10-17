<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
    @endif
    <form wire:submit.prevent="update">


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" wire:model="name">
        </div>
        @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" wire:model="slug">
        </div>

        @error('slug')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <label for="description">Description</label>
            <textarea cols="30" rows="4" class="form-control" wire:model="description"></textarea>
        </div>
        
        @error('description')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <label for="image"></label>
            <input type="file" wire:model="image" class="form-control">
        </div>

        <div class="form-group">
            <br>
            @if ($image)
            Photo Preview: 
            <img src="{{ asset('images'.'/'.$image) }}" class="img-thumbnail">
            <!--<img src="{{-- $image->temporaryUrl() --}}" class="img-thumbnail">-->
            @endif
        </div>

        @error('image')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
