<div {{ ($processing_percentage < 100 )? 'wire:poll' : '' }}>

<div class="container" style="margin:50px auto">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Edit Video</div>

                <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <p>Proccessing: {{  $this->video->processing_percentage }}</p>
                        </div>
                        <div class="col-md-4">
                            <img width="200" height="200" src="{{ asset($this->video->thumbnail) }}" class="img-responsive img-thumbnail" />
                        </div>
                    </div>

                </div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label for="title">Tile</label>
                        <input type="text" class="form-control" wire:model="title">
                        <br>
                    </div>

                    @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea cols="30" rows="4" class="form-control" wire:model="description"></textarea>
                        <br>
                    </div>

                    @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <select wire:model="visibility" class="form-control">
                            <option value="private">private</option>
                            <option value="public">public</option>
                            <option value="unlisted">unlisted</option>
                        </select>
                        <br>
                    </div>

                    @error('description')
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
            </div>
        </div>
    </div>
</div>
</div>
