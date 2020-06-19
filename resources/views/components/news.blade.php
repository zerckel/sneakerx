<a class="border-grey" href="/news/{{ $id }}" title="{{ $title }}">
        <div class="blue">News</div>
    <article>
        <div>
            <span class="author">{{ $title }}</span>
            <span class="date">{{ substr($date, 0, 16) }}</span>
        </div>
        <section>
            {{ $resume }}
        </section>
    </article>
</a>
