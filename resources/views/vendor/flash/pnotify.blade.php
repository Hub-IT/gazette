<script>
    $(function () {
        PNotify.prototype.options.styling = "fontawesome";

        $('body').on('click', '.confirm', function (e) {
            var confirm = this;
            e.preventDefault();

            new PNotify({
                title: 'Are you sure want to proceed?',
                text: '',
                type: 'warning',
                hide: 'true',
                shadow: 'true',
                delay: 3000,
                mouse_reset: true,
                confirm: {
                    confirm: true,
                    align: 'center',
                    buttons: [{
                        text: "Yes",
                        addClass: "btn btn-default btn-flat",
                        promptTrigger: true,
                        click: function (notice, value) {
                            notice.remove();
                            $(confirm).parents('form:first').submit();
                            notice.get().trigger("pnotify.confirm", [notice, value]);
                        }
                    }, {
                        text: "Cancel", addClass: "btn btn-default btn-flat", click: function (notice) {
                            notice.remove();
                            notice.get().trigger("pnotify.cancel", notice);
                        }
                    }]
                }
            });
        });
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
