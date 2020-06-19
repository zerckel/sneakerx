<div>
    <h2>
        Number of results for "{{ $search }}" : {{ count($results) }}
    </h2>
    <section>
        @foreach($results as $result)
            <x-product :product="$result"></x-product>
        @endforeach
    </section>
</div>
{{ $results->links() }}

