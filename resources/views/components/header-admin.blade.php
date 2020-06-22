<header>
    <a href="/" title="SneakerX">
        <img src="<?= asset('storage/sneakerx-logo.png') ?>" alt="Logo SneakerX">
    </a>
    <div class="subheader">
        <a <?= strstr(url()->current(), '/brands') ? "class='active'" : false ?> href="/admin/brands">Brands</a>
        <a <?= strstr(url()->current(), '/products') ? "class='active'" : false ?> href="/admin/products">Products</a>
        <a <?= strstr(url()->current(), '/news') ? "class='active'" : false ?> href="/admin/news">News</a>
    </div>
    <a href="/admin/logout/">
        <img width="25px" src="{{ asset('storage/logout.png') }}" alt="Disconnect">
    </a>
</header>
