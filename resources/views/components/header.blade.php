<header>
{{--
    <?php session()->forget('basket') ?>
--}}

    <a href="/" title="SneakerX">
        <img src="<?= asset('storage/sneakerx-logo.png') ?>" alt="Logo SneakerX">
    </a>
    <div class="menu">
        <div class="nav search_bar">
            <label>
                <input id="search" placeholder="SEARCH" type="text">
            </label>
            <img src="<?= asset('storage/search.png') ?>" class="search" alt="Basket"/>
        </div>
        <a href="/brands/" class="nav">
            Catalogue
        </a>
        <a href="/news/" class="nav">
            News
        </a>
        <a href="/contact/" class="nav">
            Contact
        </a>
        <a href="" class="nav">
            <img src="<?= asset('storage/basket.png') ?>" class="basket" alt="search"/>
        </a>
        @if(!empty(session('basket')))
            <?php
            $count_article = 0;
            foreach (session('basket') as $article){
                $count_article += $article[1];
            }
            ?>
            <div class="sticker">
                <span class="countArticles">
                    {{ $count_article }}
                </span>
            </div>
        @endif
    </div>
</header>
