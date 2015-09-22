<script>
    $(function () {
        PNotify.prototype.options.styling = "fontawesome";
    });
</script>

@if( ! $errors->isEmpty())
    <script type="text/javascript">
        $(function () {
            new PNotify({
                title: 'Something went wrong.',
                text: '',
                type: 'error',
                animation: "slide",
                hide: 'true',
                shadow: 'true',
                delay: 3000,
                mouse_reset: true
            });
        });
    </script>
@endif

@if (Session::has('flash_notification.message'))
    @if (Session::has('flash_notification.overlay'))
        @include('flash::modal', ['modalClass' => 'flash-modal',
            'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
    @else
        <script type="text/javascript">
            $(function () {
                new PNotify({
                    title: 'System message.',
                    text: '{!! Session::get('flash_notification.message') !!}',
                    type: '{!! Session::get('flash_notification.level') !!}',
                    animation: "slide",
                    hide: 'true',
                    shadow: 'true',
                    delay: 3000,
                    mouse_reset: true
                });
            });
        </script>
    @endif
@endif
