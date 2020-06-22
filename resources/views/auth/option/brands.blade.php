<div class="option container">
    <h2>
        {{ $data ? "Modify your brand" : "Add a new brand"  }}
    </h2>
    <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
        @if($data)
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control" value="{{ $data ? $data->name : old('name') }}" name="name"
                   id="name" placeholder="Enter brand name">
            @error('name')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea type="text" class="form-control" name="description" id="description" rows="3"
                      placeholder="Enter brand description">{{ $data ? $data->description : old('description') }}</textarea>
            @error('description')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="files">Select your files :</div>
        <div class="files_upload">
            <div class="form-group">
                @if($data)
                    <img height="100px" src="{{ asset('storage/brands/' . $data->pics) }}" alt="">
                @endif
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="pics" id="pics">
                        <label class="custom-file-label" for="pics">Select your main pics</label>
                    </div>
                </div>
                @error('pics')
                <small class="form-text text-muted" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>

            <div class="form-group">
                @if($data)
                    <img height="100px" src="{{ asset('storage/brands/' . $data->banner) }}" alt="">
                @endif
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="banner" id="banner">
                        <label class="custom-file-label" for="banner">Select your banner</label>
                    </div>
                </div>
                @error('banner')
                <small class="form-text text-muted" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>
        @if($data)
            <input type="hidden" name="id" value="{{ $data->id }}">
        @endif
        <button type="submit" class="btn {{ $data ? "btn-warning" : "btn-success" }}">
            {{ $data ? "MODIFY" : "ADD" }}
        </button>
    </form>
</div>
