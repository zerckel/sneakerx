<header>
    <a href="/" title="SneakerX" class="desk">
        <img src="<?= asset('storage/sneakerx-logo.png') ?>" alt="Logo SneakerX">
    </a>
    <a href="/" title="SneakerX" class="mob">
        <img src="<?= asset('storage/softwhitelogo.png') ?>" alt="Logo SneakerX">
    </a>
    <a href="/admin/logout/" class="mob disconnect">
        <img  width="25px" src="{{ asset('storage/logout.png') }}" alt="Disconnect">
    </a>
    <div class="subheader">
        <a <?= strstr(url()->current(), '/brands') ? "class='active'" : false ?> href="/admin/brands">Brands</a>
        <a <?= strstr(url()->current(), '/products') ? "class='active'" : false ?> href="/admin/products">Products</a>
        <a <?= strstr(url()->current(), '/news') ? "class='active'" : false ?> href="/admin/news">News</a>
    </div>
    <a href="/admin/logout/" class="desk">
        <img width="25px" src="{{ asset('storage/logout.png') }}" alt="Disconnect">
    </a>
</header>
