<div>
    <section class="left">
        @if($product->secondarypics)
            <div class="listPics">
                <img src="{{ asset('../storage/products/'.$product->mainpics) }}" alt="{{ $product->name }}">
            @foreach(unserialize($product->secondarypics) as $secondary)
                    <img class="img" src="{{ asset('../storage/products/'.$secondary) }}" alt="{{ $product->name }}">
                @endforeach
            </div>
        @endif
        <div class="mainPic">
            <img class="picsMain" width="300px" src="{{ asset('../storage/products/'.$product->mainpics) }}" alt="{{ $product->name }}">
        </div>
    </section>
    <section class="right">
        <div>
            <h5>{{ $product->brandName }}</h5>
            <h2>{{ $product->name }}</h2>
            <span>
                {{ substr($product->created_at, 0, 10) }}
            </span>
            <p>
                <b>Description:</b> {!! html_entity_decode($product->description) !!}
            </p>
            <div class="choice">
                <label for="color"> Colors: <br/>
                    <select>
                        <option name="color" id="color" value="">Choose your color</option>
                        @foreach(unserialize($product->colors) as $color )
                            <option name="color" id="color" value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </label>
                <label>Quantity: <br/>
                    <input type="number" value="1">
                </label>
                <label></label>
            </div>
            <div class="size">
                Size:
            </div>
            <ul>
                <li class="sizeSelect">40</li>
                <li class="sizeSelect">41</li>
                <li class="sizeSelect">42</li>
                <li class="sizeSelect">43</li>
                <li class="sizeSelect">44</li>
                <li class="sizeSelect">45</li>
                <li class="sizeSelect">46</li>
            </ul>
        </div>
        <button onclick="addToBasket({{$product->id}})">ADD TO BASKET: {{ $product->price }}$</button>
    </section>
</div>
