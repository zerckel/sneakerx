<a id="productUnique" href="/product/{{ $id }}" title="{{ $name }} ">
    <article>
        <figure>
            <img src="https://picsum.photos/300/200" alt="product">
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
