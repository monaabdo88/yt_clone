<div class="search-model-box">
    <div class="d-flex align-items-center h-100 justify-content-center">
        <div class="search-close-btn">+</div>

        {{-- search --}}
        <form action="/search" method="GET" class="search-model-form">
            <input type="text" name="query" required id="search-input" class="form-control" placeholder="Search">
            <br/>
            <button type="submit" class="search-btn btn btn-primary float-right">
                    <i class="ta-material-icons">search</i></button>

        </form>
    </div>
</div>
