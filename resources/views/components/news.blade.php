<a href="/news/{{ $id }}" title="{{ $title }}">
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
