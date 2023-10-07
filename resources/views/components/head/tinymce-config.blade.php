<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#observacoes', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists save',
    toolbar: 'undo redo | blocks | blocks fontsizeinput | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table',
    save_enablewhendirty: false
  });
</script>
<script>
  tinymce.init({
    selector: 'textarea#observacoesPaciente', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists save',
    save_enablewhendirty: false,
    toolbar: false,
    menubar: true,
    width: 600,
    readonly: true
  });
</script>