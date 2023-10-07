<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#observacoes', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists save',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | save',
    save_enablewhendirty: false
  });
</script>
<script>
  tinymce.init({
    selector: 'textarea#observacoesPaciente', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists save',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | save',
    save_enablewhendirty: false
  });
</script>