@props(['frontendClass' => false])

<div id="confirmationModal" class="modal custom--modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Confirmation Alert!')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                @csrf
                <div class="modal-body">
                    <p class="question"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn @if ($frontendClass) btn--md @endif btn--dark" data-bs-dismiss="modal">@lang('No')</button>
                    <button type="submit" class="btn {{ $frontendClass ? 'btn--base  btn--md' : 'btn--primary' }}">@lang('Yes')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        (function($) {
            "use strict";
            $(document).on('click', '.confirmationBtn', function() {
                var modal = $('#confirmationModal');
                let data = $(this).data();
                modal.find('.question').text(`${data.question}`);
                modal.find('form').attr('action', `${data.action}`);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
@push('style')
    <style>
        #confirmationModal .btn-close:focus {
            box-shadow: none !important;
        }
    </style>
@endpush
