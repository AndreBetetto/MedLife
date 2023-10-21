<x:modals.medico.form-modal>

    <div class=" items-center">
        <div class="mt-3 mb-2">
            <span for="emailContent" class=" font-semibold">Exames:</span>
            <p>
                <input type="text" class=" mt-2 w-1/2 h-12" name="emailContent" id="emailContent">
            </p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#emailButton').click(function() {
                var recipient = 'recipient@example.com';
                var subject = 'Your Subject Here';
                var emailContent = $('#emailContent').val(); // Get content from the input field
                var mailtoLink = 'mailto:' + recipient + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(emailContent);
                window.open(mailtoLink, '_blank');
            });
        });
    </script>

    <div class="">
        <a href="#" id="emailButton">
            <x-primary-button>
                Enviar email
            </x-primary-button>
        </a>
        <x-primary-button type="reset">{{ __('Limpar') }}</x-primary-button>
    </div>
</x:modals.medico.form-modal>