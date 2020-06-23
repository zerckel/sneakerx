<article>
    <div class="title">
        <h2>
            {{ $news->title }}
        </h2>
    </div>
    <div class="short">
        {{ $news->resume }}
    </div>
    <section>
        {!! html_entity_decode($news->content)  !!}
    </section>
</article>
