<article id="brand">
    <a href="/brands/{{ $brand->id }}">
        <figure>
            <img width="220px" src="{{ asset('../storage/brands/' . $brand->pics) }}" alt="{{ $brand->name }}">
        </figure>
        <button>
            SEE MORE
        </button>
    </a>
</article>
