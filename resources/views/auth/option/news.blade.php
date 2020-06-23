<div class="option container">
    <h2>
        {{ $data ? "Modify your news" : "Add a new news"  }}
    </h2>
    <form name="formProduct" id="formProduct" action="{{ url()->current() }}" method="POST"
          enctype="multipart/form-data">
        @if($data)
            @method('PUT')
        @endif
        @csrf
        <div class="form-group name">
            <label for="name">Title :</label>
            <input type="text" class="form-control" value="{{ $data ? $data->title : old('title') }}" name="title"
                   id="name" placeholder="Enter news title">
            @error('title')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="form-group name">
            <label for="name">Resume :</label>
            <input type="text" class="form-control" value="{{ $data ? $data->resume : old('resume') }}" name="resume"
                   id="name" placeholder="Enter news title">
            @error('resume')
            <small class="form-text text-muted" role="alert">
                {{ $message }}
            </small>
            @enderror
        </div>
        <div class="files description">
            Content :
        </div>
        <div id="editor">
            {!! $data ? html_entity_decode($data->content) : old('description') !!}
        </div>
        <input id="description" type="hidden" name="content" value="">
        @error('content')
        <small class="form-text text-muted" role="alert">
            {{ $message }}
        </small>
        @enderror
        <div class="files description">
            Publication date :
        </div>
        <label>
            <input type="date" class="date" value="{{ $data ? $data->created_at : old('date') }}" name="date">
        </label>
        @if($data)
            <input type="hidden" name="id" value="{{ $data->id }}">
        @endif
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
