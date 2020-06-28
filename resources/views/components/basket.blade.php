<?php

use App\Http\Controllers\basketController;

/** @var basketController $basket */

$totalPrice = 0;
$nbr = 0;
foreach ($basket as $article) {
    $totalPrice += $article["\x00*\x00items"][0]->price * $article[0];
    $nbr += $article[0];
}
?>
<div class="content">
    <h2>
        <span>
            Your cart
        </span>
        <span>
           Number of articles: <span class="totalQuantity">{{ $nbr }}</span>
        </span>
    </h2>
    @foreach($basket as $article)
        <div data-id="{{ $article["\x00*\x00items"][0]->id }}" class="article">
            <figure>
                <img class="img" width="100px" src="{{ asset( '../storage/products/' . $article["\x00*\x00items"][0]->mainpics) }}"
                     alt="{{ $article["\x00*\x00items"][0]->name }}">
                <figcaption>
                    <span class="name">{{ $article["\x00*\x00items"][0]->name }}</span>
                    <span>Price : <span class="price">{{ $article["\x00*\x00items"][0]->price }}</span>$</span>
                </figcaption>
            </figure>
            <div class="colors">
                <label for="colors">
                    <select name="colors" id="colors">
                        @foreach(unserialize($article["\x00*\x00items"][0]->colors) as $color )
                            <option name="color" id="color" value="{{ $color }}">{{ $color }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="size">
                <label for="size">
                    <select name="size" id="size">
                        <option name="size" value="40">40</option>
                        <option name="size" value="41">41</option>
                        <option name="size" value="42">42</option>
                        <option name="size" value="43">43</option>
                        <option name="size" value="44">44</option>
                        <option name="size" value="45">45</option>
                        <option name="size" value="46">46</option>
                    </select>
                </label>
            </div>
            <div class="quantity">
                <label for="quantity">
                    <input onkeydown="return false" id="quantity" name="quantity" min="0" type="number"
                           value="{{ $article[0]}}">
                </label>
            </div>
        </div>
        <hr/>
    @endforeach
    <div class="form">
        <h2>
            Personal Information :
        </h2>
        <div>
            <div class="userInfo">
                <label for="name">
                    <input id="name" placeholder="Name" type="text">
                </label>
                <label for="email">
                    <input id="email" placeholder="example@mail" type="email">
                </label>
                <label for="address">
                    <input id="address" placeholder="Address" type="text">
                </label>
                <label for="postal">
                    <input id="postal" placeholder="Postal code" type="text">
                </label>
            </div>
            <div class="card">
                <label for="cardNumber">
                    <input id="cardNumber" placeholder="Card number" type="text">
                </label>
                <div>
                    <label for="date">
                        <input id="date" placeholder="date" type="date">
                    </label>
                    <label for="cvv">
                        <input id="cvv" placeholder="CVV" type="number">
                    </label>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($basket))

        <div class="order">
            <span>
                Total price: <span class="totalPrice">{{ $totalPrice }}</span>$
            </span>
            <button id="order">
                Finalize the order
            </button>
        </div>

    @endif
</div>

