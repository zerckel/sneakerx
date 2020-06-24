<a id="productUnique" href="/product/{{ $id }}" title="{{ $name }} ">
    <article>
        <figure>
            <img height="100px" style="display: block; margin: 0 auto" src="{{ asset('../storage/products/' . $pics) }}" alt="product">
            <figcaption>
            <span>
               {{ $name }}
            </span>
                <span>
                {{ $price }}$
            </span>
            </figcaption>
        </figure>
        <button>SEE MORE DETAILS</button>
        <object>
            <a href="" onclick="return false">
                <button onclick="addToBasket({{$id}})">
                    ADD TO BASKET : {{ $price }}$
                </button>
            </a>
        </object>
    </article>
</a>
