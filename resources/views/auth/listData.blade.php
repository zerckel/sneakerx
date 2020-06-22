<div class="container">
    <div>
        <div></div>
        <h2>
            List of
            @switch(strstr(url()->current(), '/admin/'))
                @case('/admin/brands')
                Brands
                @break
                @case('/admin/products')
                products
                @break
                @case('/admin/news')
                news
                @break
            @endswitch
        </h2>
        <a href="{{ url()->current() }}/add" class="btn btn-success">
            Add
            @switch(strstr(url()->current(), '/admin/'))
                @case('/admin/brands')
                Brands
                @break
                @case('/admin/products')
                products
                @break
                @case('/admin/news')
                news
                @break
            @endswitch
        </a>
    </div>
    <div class="list">
        <div class="headList">
            <span>
                ID
                {{ strstr(url()->current(), '/products') ? " || brands ID" : false  }}
            </span>
            <span>NAME</span>
            <span>OPTION</span>
        </div>
        @foreach($data as $elem)
            <div class="elemList">
                <span>
                    {{ $elem->id }}
                    {{ isset($elem->brandId) ? ' || '. $elem->brandId : false }}
                </span>
                <span>
                    {{ $elem->name ?? $elem->title }}
                </span>
                <div class="option">
                    <a href="{{ url()->current() }}/{{ $elem->id }}">
                        <button class="btn btn-warning">
                            UPDATE
                        </button>
                    </a>
                    <form action="{{ url()->current() }}/{{ $elem->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            DELETE
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
