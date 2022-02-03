<script src="assets/js/menuscript.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/tinymce/tinymce.min.js"></script>
<script src="assets/js/tinymce/init-tinymce.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	 <script>
	    $(document).ready(function() {
            $('#datable').DataTable();
			
			$(".delete").click(function(){
				return confirm("Are you sure you want to delete this record?");	
			});
			
			$( ".divholder" ).sortable();
			$( ".divholder" ).disableSelection();
			
			$('#morefield').click(function(){
			
				$('.divholder').append('<div class="testcont"><hr /><div class="qanda row"><div class="col-md-6">			<label>Question Type</label><select name="qtype[]"><option>...</option><option value="inputtext">Text</option><option value="checkboxes">Checkboxes</option><option value="radio">Radio Buttons</option></select></div><div class="col-md-12"><div class="quest"><label>Question</label><br /><textarea name="question[]"></textarea></div></div><div class="col-md-6"><div class="ans"><label>Answers - Radio buttons and checkboxes Separate with (~)</label><br /><textarea name="answers[]" /></textarea></div></div><div class="col-md-6"><div class="corrans"><label>Correct Answer - Separate multiple answers with (~)</label><br /><textarea name="correctans[]"></textarea></div></div><div class="col-md-12"><div class="comment"><label>Comment</label><br /><textarea name="comments[]"></textarea></div></div></div>');
			});
			$(document).on('click','.deletequest', function(){
				$(this).closest(".testcont").remove();
			});
			
			
			
			
			var count = 100;
			$('#addsec').click(function(){
				count++;
				
			$('#secbx').append('<hr /><div class="sectionbox"><div class="row"><div class="col-md-4 fieldtitle">Section title</div><div class="col-md-8"><input type="text" name="sectitle[]" placeholder="Enter the section title" /></div></div><div class="row"><div class="col-md-4 fieldtitle">Content</div><div class="col-md-8"><textarea class="tinymce"  name="courseconent[]"></textarea></div></div><br /><div class="row"><div class="col-md-4 fieldtitle">Has quiz</div><div class="col-md-8"><label style="float:none !important;"><input type="radio" name="hasquiz'+count+'"" value="Yes" required>Yes</label>&nbsp;&nbsp;&nbsp;<label style="float:none !important;"><input type="radio" name="hasquiz'+count+'" value="No">No</label><p><u><a href="" id="deletesec">Delete Section</a></u></p></div></div></div>');				
				tinymce.init({ 
					selector: "textarea.tinymce",
					/* theme of the editor */
	theme: "modern",
	skin: "lightgray", 
	
	/*external_plugins: {
		'WYImageManager': '../../plugins/wy_image_manager/webyurt_image_manager/js/tinymce5/external_plugins/wyimagemanager/plugin.js'
	},
	file_picker_callback: function (callback, value, meta) {
		OpenWYImageManager(callback, value, meta);
	},*/
	
	/* width and height of the editor */
	width: "100%",
	height: 300,
	
	/* display statusbar */
	statubar: true,
	
	/* plugin */
	plugins: [
		"advlist autolink link image code lists charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor imagetools"
	],

	/* toolbar */
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | code",
	
	/* style */
	style_formats: [
		{title: "Headers", items: [
			{title: "Header 1", format: "h1"},
			{title: "Header 2", format: "h2"},
			{title: "Header 3", format: "h3"},
			{title: "Header 4", format: "h4"},
			{title: "Header 5", format: "h5"},
			{title: "Header 6", format: "h6"}
		]},
		{title: "Inline", items: [
			{title: "Bold", icon: "bold", format: "bold"},
			{title: "Italic", icon: "italic", format: "italic"},
			{title: "Underline", icon: "underline", format: "underline"},
			{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
			{title: "Superscript", icon: "superscript", format: "superscript"},
			{title: "Subscript", icon: "subscript", format: "subscript"},
			{title: "Code", icon: "code", format: "code"}
		]},
		{title: "Blocks", items: [
			{title: "Paragraph", format: "p"},
			{title: "Blockquote", format: "blockquote"},
			{title: "Div", format: "div"},
			{title: "Pre", format: "pre"}
		]},
		{title: "Alignment", items: [
			{title: "Left", icon: "alignleft", format: "alignleft"},
			{title: "Center", icon: "aligncenter", format: "aligncenter"},
			{title: "Right", icon: "alignright", format: "alignright"},
			{title: "Justify", icon: "alignjustify", format: "alignjustify"}
		]}
	],
	
	images_upload_url: 'components/postAcceptor.php',
	automatic_uploads : false,
	
	file_picker_types: 'image', 
	// and here's our custom image picker
	file_picker_callback: function(cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'assets/uploads/*');
			
			// Note: In modern browsers input[type="file"] is functional without 
			// even adding it to the DOM, but that might not be the case in some older
			// or quirky browsers like IE, so you might want to add it to the DOM
			// just in case, and visually hide it. And do not forget do remove it
			// once you do not need it anymore.

				input.onchange = function() {
			  var file = this.files[0];
			  
			  var reader = new FileReader();
			  reader.onload = function () {
				// Note: Now we need to register the blob in TinyMCEs image blob
				// registry. In the next release this part hopefully won't be
				// necessary, as we are looking to handle it internally.
				var id = 'blobid' + (new Date()).getTime();
				var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
				var base64 = reader.result.split(',')[1];
				var blobInfo = blobCache.create(id, file, base64);
				blobCache.add(blobInfo);

				// call the callback and populate the Title field with the file name
				cb(blobInfo.blobUri(), { title: file.name });
			  };
			  reader.readAsDataURL(file);
			};
			
			input.click();
		  },
	images_upload_handler : function(blobInfo, success, failure) {
		var xhr, formData;

		xhr = new XMLHttpRequest();
		xhr.withCredentials = false;
		xhr.open('POST', 'components/postAcceptor.php');

		xhr.onload = function() {
			var json;

			if (xhr.status != 200) {
				failure('HTTP Error: ' + xhr.status);
				return;
			}

			json = JSON.parse(xhr.responseText);

			if (!json || typeof json.file_path != 'string') {
				failure('Invalid JSON: ' + xhr.responseText);
				return;
			}

			success(json.file_path);
		};

		formData = new FormData();
		formData.append('file', blobInfo.blob(), blobInfo.filename());

		xhr.send(formData);
	}
		
	
	/*file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '.../kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }*/
				});
			});
			$(document).on('click','#deletefield', function(){
				$(this).closest(".qanda").remove();
			});
			$(document).on('click','#deletesec', function(){
				//$(this).closest(".qanda").remove();
				event.preventDefault();
				$(this).closest(".sectionbox").remove();
			});
        })
	 </script>

