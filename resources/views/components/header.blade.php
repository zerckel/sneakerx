<header>
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
        <a href="" class="nav">
            Catalogue
        </a>
        <a href="" class="nav">
            News
        </a>
        <a href="" class="nav">
            Contact
        </a>
        <a href="" class="nav">
            <img src="<?= asset('storage/basket.png') ?>" class="basket" alt="search"/>
        </a>
    </div>
</header>

<script type="text/javascript" rel="script">

    function getValue(elem) {

        let search = document.querySelector('#search').value

        if (search !== "" && elem.key === "Enter" || elem.key === undefined && search !== "") {
            LaunchSearch(search)
        }
    }

    function LaunchSearch(search) {
        document.location.href = "/search/" + search
    }

    document.querySelector('#search').addEventListener("keypress", evt => getValue(evt))
    document.querySelector('.search').addEventListener("click", evt => getValue(evt))
</script>
