@extends('layout.masterAdmin')

@section('id', 'admin')

@section('body')

    {{ View::make('auth.option.'.$cat)->with('data', $data ?? false) }}

    <script type="text/javascript">
        document.querySelectorAll('input[type="file"]').forEach(res => res.addEventListener('change', displayName))

        function displayName() {
            this.nextSibling.nextSibling.innerHTML = this.files[0].name
        }
    </script>

@endsection

