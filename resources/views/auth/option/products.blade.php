@php
    use Illuminate\Support\Facades\DB;
    $brandList = DB::table('brands')->select('id','name')->get();
@endphp
<div class="option container">
    <h2>
        {{ $data ? "Modify your brand" : "Add a new brand"  }}
    </h2>
    <form name="formProduct" id="formProduct" action="{{ url()->current() }}" method="POST"
          enctype="multipart/form-data">
        @if($data)
            @method('PUT')
        @endif
        @csrf
        <div class="form-group name">
            <label for="name">Name :</label>
            <input type="text" class="form-control" value="{{ $data ? $data->name : old('name') }}" name="name"
                   id="name" placeholder="Enter brand name">
            @error('name')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="form-group color">
            <label for="color">Color :</label>
            @if($data)
                <input type="text" class="form-control"
                       value="@foreach(unserialize($data->colors) as $color) {{$color}}, @endforeach" name="color"
                       id="color" placeholder="Enter available color like this: white,red,ect">
            @else
                <input type="text" class="form-control" value="{{ old('color') }}" name="color"
                       id="color" placeholder="Enter available color like this: white,red,ect">
            @endif
            @error('color')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group brand">
                <label for="brands">Select a brand :</label>
                <select multiple class="form-control" name="brand" id="brands">
                    @if($data)
                        <option selected value="{{ $data->brandId }}">{{ $data->brandName }}</option>
                    @endif
                    @foreach($brandList as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                @error('brand')
                <small class="form-text text-muted" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
            <div class="form-group price">
                <label for="price">Price :</label>
                <div>
                    <input min="0" type="number" value="{{ $data ? $data->price : old('price') }}" name="price"
                           class="form-control"
                           id="price"/><span>$</span>
                </div>
            </div>
            @error('price')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>

        <div class="files description">
            Description :
        </div>
        <div id="editor">
            {!! $data ? html_entity_decode($data->description) : old('description') !!}
        </div>
        <input id="description" type="hidden" name="description" value="">
        @error('description')
        <small class="form-text text-muted" role="alert">
            {{ $message }}
        </small>
        @enderror

        <div class="published">
            Is published ?
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="publishedY" value="1" name="published" class="custom-control-input" checked>
                <label class="custom-control-label" for="publishedY">Yes</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="publishedN" value="0" name="published" class="custom-control-input">
                <label class="custom-control-label" for="publishedN">No</label>
            </div>
        </div>
        @error('published')
        <small class="form-text text-muted" role="alert">
            {{ $message }}
        </small>
        @enderror
        <div class="files">Select your files :</div>

        <div class="files_upload">
            <div class="form-group">
                @if($data)
                    <img height="100px" src="{{ asset('storage/products/' . $data->mainpics) }}" alt="">
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
                    <img height="100px" src="" alt="">
                @endif
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="secondary[]" id="secondary" multiple>
                        <label class="custom-file-label" for="secondary">Select your secondary pics</label>
                    </div>
                </div>
                @error('secondary')
                <small class="form-text text-muted" role="alert">
                    {{ $message }}
                </small>
                @enderror
            </div>
        </div>
        @if($data)
            <input type="hidden" name="id" value="{{ $data->id }}">
        @endif
        <button onclick="submitForm()" type="button" class="btn-option btn {{ $data ? "btn-warning" : "btn-success" }}">
            {{ $data ? "MODIFY" : "ADD" }}
        </button>
    </form>
</div>

<script type="text/javascript">

    function submitForm() {
        document.querySelector('#description').value = document.querySelector('#editor .ql-editor').innerHTML
        document.forms["formProduct"].submit()
    }
</script>
