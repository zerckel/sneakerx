<div>
    @if(!isset($news))
        <figure class="border-grey">
            <img src="<?= isset($brand) ? $brand->banner : "../storage/softLogo.png" ?>" alt="SneakerX">
            <figcaption>
                <h2>
                    {{  isset($brand)  ?  $brand->name  : "BRANDS:" }}
                </h2>
                <span>
                {{  isset($brand)  ?  $brand->description  : "Here, find the most popular brands and
                find the pair of your dreams" }}
            </span>
            </figcaption>
        </figure>
    @else
        <figure class="border-grey">
            <img src="../storage/icon.png " alt="SneakerX">
            <figcaption>
                <h2>
                    News
                </h2>
                <span>
                "Here, find the most recent News"
            </span>
            </figcaption>
        </figure>
    @endif
    @if(isset($brand))
        <section>
            @foreach($products as $product)
                <x-product :product=" $product "></x-product>
            @endforeach
        </section>
    @elseif(isset($news))
        <section id="news">

            @foreach($news as $new)
                <x-news :news=" $new "></x-news>
            @endforeach
        </section>
    @else
        <section>
            @foreach($brands as $brand)
                <x-brand :brand=" $brand "></x-brand>
            @endforeach
        </section>
    @endif
</div>

@if(isset($brands))
    {{ $brands->links() }}
@elseif(isset($news))
    {{ $news->links() }}
@else
    {{ $products->links() }}
@endif



