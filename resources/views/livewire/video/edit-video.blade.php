
<div class="container">
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