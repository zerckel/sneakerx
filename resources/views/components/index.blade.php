<section>
    <h2>
        <img src="storage/arrow-down.png" alt="arrow down"> <span class="robotomonoLight">Articles for <b>YOU</b></span> <img
            src="storage/arrow-down.png" alt="arrow down">
    </h2>
    <div id="product">
        <pre>

        @php
            var_dump($products);
die();
        @endphp
        </pre>
        @foreach($products as $product)
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
