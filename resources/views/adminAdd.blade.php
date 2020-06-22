@extends('layout.masterAdmin')

@section('id', 'admin')

@section('body')

    @switch(strstr(url()->current(), '/admin/'))
        @case('/admin/brands/add')
        {{ View::make('auth.option.brands')->with('data', false) }}
        @break
        @case('/admin/products/add')
        {{ View::make('auth.option.products')->with('data', false) }}
        @break
        @case('/admin/news/add')
        {{ View::make('auth.option.news')->with('data', false) }}
        @break
    @endswitch

    <script type="text/javascript">
        document.querySelectorAll('input[type="file"]').forEach(res => res.addEventListener('change', displayName))

        function displayName() {
            this.nextSibling.nextSibling.innerHTML = this.files[0].name
        }
    </script>

@endsection

