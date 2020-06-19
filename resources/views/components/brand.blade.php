<article id="brand">
    <a href="/brands/{{ $brand->id }}">
        <figure>
            <img src="https://picsum.photos/200/100" alt="{{ $brand->name }}">
            <figcaption>
                {{ $brand->name }}
            </figcaption>
        </figure>
        <button>
            SEE MORE
        </button>
    </a>
</article>
