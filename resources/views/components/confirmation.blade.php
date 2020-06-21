<?php $totalPrice = 0 ?>
<div class="content">
    <h1>
        Order confirmation
    </h1>
    <div class="userInfo">
        <h2>
            Personal information :
        </h2>
        <div>
                {{ $order->name }}
        </div>
        <div>
                {{ $order->email }}
        </div>
        <div>
            {{ $order->address }}
        </div>
    </div>
    <div class="articles">
        <h2>
            List of products :
        </h2>
        @foreach(unserialize($order->products) as $article)
            @php
                $totalPrice += $article['price']
            @endphp
            <div class="article">
                <figure>
                    <img width="100px" src="{{ $article['img'] }}" alt="{{ $article['name'] }} ">
                    <figcaption>
                        <div>
                            <div>{{ $article['name'] }} x {{ $article['quantity'] }}</div>
                            <div>Color: {{ $article['color'] }}</div>
                            <div>Size: {{ $article['size'] }}</div>
                        </div>
                        <div class="price">
                            price: {{ $article['price'] }}$
                        </div>
                    </figcaption>
                </figure>

            </div>
        @endforeach
        <div class="totalPrice">
            <b>Total price:</b> {{ $totalPrice }}$
        </div>
    </div>
</div>
