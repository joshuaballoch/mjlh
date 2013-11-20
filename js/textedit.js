$(document).ready(function(){
  $textareas = $("textarea.wysiwyg");
  for (i = 0; i < $textareas.length; i++  ) {
    $textarea = $($textareas[i]);
    $form = $textarea.closest('form');

    // Hide the textarea
    $textarea.hide();

    // Add a summernote div to replace the textarea
    id = "summernote-"+i;
    $textarea.after("<div id='"+id+"'></div>");
    $textarea.attr("data-summernote-id","#"+id);
    $summernote = $("#"+id);
    $summernote.summernote({
      height:200//,
    });

    // Drop the code from the textarea into the summernote div
    $summernote.code($textarea.val());

    // Update the textarea on form submission..
    $form.on("submit",function(event){
      for (i = 0; i < $textareas.length; i++  ) {
        $textareaF = $($textareas[i]);
        s_id = $textareaF.data('summernote-id');
        $textareaF.val($(s_id).code());
      }
    });

  }

});
