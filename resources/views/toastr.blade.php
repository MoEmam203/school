<script>
    toastr.options.escapeHtml = true;
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "300",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{Session::get('warning')}}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}")
    @endif

    @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}")
    @endif

</script>