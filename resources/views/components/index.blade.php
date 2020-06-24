<section>
    <h2>
        <img src="storage/arrow-down.png" alt="arrow down"> <span class="robotomonoLight">Articles for <b>YOU</b></span> <img
            src="storage/arrow-down.png" alt="arrow down">
    </h2>
    <div id="product">

        @foreach($products as $product)
            <pre>

        @php
            var_dump($product);
die();
        @endphp
        </pre>
            <x-product :product="$product"></x-product>
        @endforeach
    </div>
</section>
<section>
    <h2>
        <img src="storage/arrow-down.png" alt="arrow down">
        <span class="robotomonoLight">Latest News</span>
        <img src="storage/arrow-down.png" alt="arrow down">
    </h2>
    <div id="news">
        @foreach($news as $new)
            <x-news :news="$new"></x-news>
        @endforeach
    </div>
</section>
