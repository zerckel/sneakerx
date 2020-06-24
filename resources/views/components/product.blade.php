<a id="productUnique" href="/product/{{ $product->id }}" title="{{ $product->name }} ">
    <article>
        <figure>
            <img height="100px" style="display: block; margin: 0 auto" src="{{ asset('../storage/products/' . $product->mainpics) }}" alt="product">
            <figcaption>
            <span>
               {{ $product->name }}
            </span>
                <span>
                {{ $product->price }}$
            </span>
            </figcaption>
        </figure>
        <button>SEE MORE DETAILS</button>
        <object>
            <a href="" onclick="return false">
                <button onclick="addToBasket({{$product->id}})">
                    ADD TO BASKET : {{ $product->price }}$
                </button>
            </a>
        </object>
    </article>
</a>
