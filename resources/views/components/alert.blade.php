@section('alert')
    <script>
        window.notyf.open({
            'type': '{{ $type }}',
            'message': '{{ $slot }}',
            'duration': 5000,
            'ripple': true,
            'dismissible': true
        });
    </script>
@endsection
