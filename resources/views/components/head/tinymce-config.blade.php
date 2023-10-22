<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#observacoes', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists save insertdatetime help wordcount anchor searchreplace visualblocks fullscreen media',
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
<script>
  tinymce.init({
    selector: 'textarea#observacoesMedico', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: ['code table lists save','advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
    'anchor', 'searchreplace', 'visualblocks','fullscreen',
    'insertdatetime', 'media', 'help', 'wordcount'
  
  ],
    toolbar: 'undo redo | blocks | blocks fontsizeinput | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table',
    save_enablewhendirty: false,
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  });
</script>