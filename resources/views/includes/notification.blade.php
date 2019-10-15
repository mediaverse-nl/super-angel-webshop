
<div class='notifications top-right'></div>


@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <style>
        .notifications{
            z-index: 999;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>
    <script>
        @if(Session::has('success'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('success') }}" }
            }).show();
            @php
              Session::forget('success');
            @endphp
        @endif

        @if(Session::has('info'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('info') }}" },
                type:'info'
            }).show();
            @php
              Session::forget('info');
            @endphp
        @endif

        @if(Session::has('warning'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('warning') }}" },
                type:'warning'
            }).show();
            @php
              Session::forget('warning');
            @endphp
        @endif

        @if(Session::has('error'))
            $('.top-right').notify({
                message: { text: "{{ Session::get('error') }}" },
                type:'danger'
            }).show();
            @php
                Session::forget('error');
            @endphp
        @endif
    </script>

@endpush