@push('scripts')
<script src="{{ asset('vendor/plugins/notify/js/notifIt.js') }}"></script>

@if(session('success'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    notif({
        msg: "<b>Success:</b> {{ session() -> get('success')}}",
        type: "success"
    });
});
</script>
@endif

@if(session('error'))
<script>
document.addEventListener("DOMContentLoaded", function() {
    var errorMsg = {!! json_encode(session('error')) !!};

    notif({
        type: "error",
        msg: "Error : "+errorMsg,
        position: "center",
        width: 600,
        autohide: false,
        multiline: 1, 
        height: 120
    });
});
</script>
@endif

@if(session('warning'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
    notif({
        msg: "<b>Warning:</b> {{ session('warning') }}",
        type: "warning",
        position: "left",
    });
});
</script>
@endif
@endpush
