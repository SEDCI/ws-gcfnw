// Custom JS for GCF

$('[name="civilstatus"]').click(function(){
	if ($(this).val() == 'O') {
		$('#ocivilstatus').removeAttr('disabled');
	}
	else {
		$('#ocivilstatus').attr('disabled', 'true');
	}
});

$('.datepicker').datepicker({
	format: "yyyy-mm-dd",
	endDate: "now",
	startView: 2,
	clearBtn: true,
	autoclose: true,
	todayHighlight: true,
	orientation: "top auto"
});

function toggleOtherCivilStatus(){
	var civilstatus = $('[name="civilstatus"]').val();

	if (civilstatus == 'O') {
		$('#ocivilstatus').removeAttr('disabled');
	}
	else {
		$('#ocivilstatus').attr('disabled', 'true');
	}
}

$('form').on('click', '.addChild', function(){
	var childclone = $('#new-child')
		.clone()
		.removeClass('row-hide');

	childclone.find('[name="cname[]"]').val('');
	childclone.find('[name="cbirthday[]"]').val('').datepicker({
			format: "yyyy-mm-dd",
			endDate: "now",
			startView: 2,
			clearBtn: true,
			autoclose: true,
			todayHighlight: true,
			orientation: "top auto"
		});

	$('#children').append(childclone);
});

$('.addEduc').on('click', function(){
	var lvl = $(this).attr('id').substr(3);
	var educlone = $('#new-' + lvl + 'school')
		.clone()
		.removeClass('row-hide');

	educlone.find('[name="' + lvl + 'nameschool[]"]').val('');
	educlone.find('[name="' + lvl + 'course[]"]').val('');
	educlone.find('[name="' + lvl + 'incyears[]"]').val('');

	$('#' + lvl + 'ed').append(educlone);
});

$('.delrec').on('click', function(){
	return confirm('Are you sure you want to delete this record?');
});

$('.rejrec').on('click', function(){
	return confirm('Are you sure you want to reject this application?');
});

$('.apprec').on('click', function(){
	return confirm('Are you sure you want to approve this application?');
});

$('.remove-file').on('click', function(){
	if (confirm('Are you sure you want to remove this file?')) {
		var current_file_div = $(this).parent('div.current-file');
		var ftype = current_file_div.attr('id');
		var parent_div = current_file_div.parent('div');

		current_file_div.remove();
		parent_div.append('<input type="file" id="wmfile' + ftype + '" name="wmfile' + ftype + '" />');
	}

	return false;
});
/*
$('#commentslist').on('show.bs.modal', function () {
	alert()
});
*/
$('.remove-comment').on('click', function(){ // THIS IS WHERE YOU LEFT OFF
	if (confirm('Are you sure you want to remove this comment?')) {
		var delurl = $(this).attr('href');
		var comment_div = $(this).parents('div').eq(2);
		var wmcid = comment_div.find('.wmcid').val();

		$.get(delurl);

		//alert(wmcid);

		comment_div.remove();
		//parent_div.append('<input type="file" id="wmfile' + ftype + '" name="wmfile' + ftype + '" />');
	}

	return false;
});

$('.gallery .addpic').on('click', function() {
	$('#albumpic').click();
});

$('#albumpic').on('change', function() {
	$('#uploadform').submit();
});

$('#uploadform').on('submit', function(e) {
	var fdata = new FormData(this);
	var inputfile = document.getElementById('albumpic');
	var files = inputfile.files;

	fdata.append('albumpic', files);

	uploadPic(fdata);

	e.preventDefault();
});

$('#upload').on('hide.bs.modal', function() {
	$('#upload .modal-title').html('');
	$('#upload .progress').toggle();
	$('#uploadmsg').html('');
	$('#upload .modal-footer').toggle();
	$('.progress-bar').css({ 'width' : '0%' })
});

$('#upload').on('show.bs.modal', function() {
	$('#upload .modal-title').html('Uploading photos...');
});

$('.photo img').on('click', function() {
	var idx = $('.photo img').index(this);
	var pic = $(this).attr('src');
	var da = $(this).attr('title');

	if (idx == 0) {
		$('#imgprevious').attr('disabled', 'true');
	} else {
		$('#imgprevious').removeAttr('disabled');
	}

	if (idx == $('.photo').length - 1) {
		$('#imgnext').attr('disabled', 'true');
	} else {
		$('#imgnext').removeAttr('disabled');
	}

	setImgpagination(idx);

	$('#previewimg').attr('src', pic);
	$('#imgdate').html(da);
	$('#preview').modal('show');
});

$('#preview').on('hide.bs-modal', function() {
	$('#previewimg').removeAttr('src');
});

$('#imgprevious').on('click', function() {
	var idx = getPreviewedphotoindex() - 1;

	setImginfo(idx);

	if (idx == 0) {
		$(this).attr('disabled', 'true');
	}

	if (idx < $('.photo').length - 1) {
		$('#imgnext').removeAttr('disabled');
	}

	setImgpagination(idx);
});

$('#imgnext').on('click', function() {
	var idx = getPreviewedphotoindex() + 1;

	setImginfo(idx);

	if (idx == $('.photo').length - 1) {
		$(this).attr('disabled', 'true');
	}

	if (idx > 0) {
		$('#imgprevious').removeAttr('disabled');
	}

	setImgpagination(idx);
});

$('.delpic').on('click', function() {
	var picid = $(this).closest('div').find('[type="hidden"]').val();

	if (confirm("This photo will be deleted permanently. Proceed?")) {
		window.location = window.location.href + '/photo/' + picid + '/delete';
	}

	return false;
});

$('#atitle #titletxt').on('click', function() {
	var atitle = $(this).text();

	$('#atitle [type="text"]').toggle().val(atitle).focus();
	$(this).toggle();
});

$('#atitle [type="text"]').on('blur', function() {
	var url_segments = window.location.href.split('/');
	var slug = url_segments[url_segments.length - 1];
	var id = slug.split('-')[0];
	var oatitle = $('#atitle #titletxt').html();
	var atitle = $(this).val();

	$.post('../edit/' + id, { 'atitle' : atitle },
		function(data) {
			if (data.success == 'false') {
				alert(data.error_msg);
				$('#atitle [type="text"]').val($('#atitle #titletxt').html());
			} else {
				$('#atitle #titletxt').toggle().html(atitle);
				$('#atitle [type="text"]').toggle();
			}
		}, 'json'
	);
})

$('#adesc #desctxt').on('click', function() {
	var adesc = $(this).text();

	$('#adesc textarea').toggle().val(adesc).focus();
	$(this).toggle();
});

$('#adesc textarea').on('blur', function() {
	var url_segments = window.location.href.split('/');
	var slug = url_segments[url_segments.length - 1];
	var id = slug.split('-')[0];
	var oadesc = $('#adesc #desctxt').html();
	var adesc = $(this).val();

	$.post('../edit/' + id, { 'adesc' : adesc },
		function(data) {
			if (data.success == 'false') {
				alert(data.error_msg);
				$('#adesc textarea').val($('#adesc #desctxt').html());
			} else {
				$('#adesc #desctxt').toggle().html(adesc);
				$('#adesc textarea').toggle();
			}
		}, 'json'
	);
})

$('.delalbum').on('click', function(e){
	if (confirm("You are about to delete this album.\nThis will also delete all photos included in the album.\nProceed?")) {
		window.location = window.location.href.replace('view', 'delete');
	}

	return false;
});

function getPreviewedphotoindex() {
	var pic = $('#previewimg').attr('src');

	return $('.photo img').index($(".photo img[src=\"" + pic + "\"]"));
}

function setImginfo(idx) {
	var pic = $('.photo img:eq('+ idx +')').attr('src');
	var da = $('.photo img:eq('+ idx +')').attr('title');

	$('#previewimg').attr('src', pic);
	$('#imgdate').html(da);
}

function setImgpagination(idx) {
	$('#imgpagination').html((idx + 1) + ' of ' + $('.photo').length);
}

function uploadPic(formdata) {
	var url_segments = window.location.href.split('/');
	var slug = url_segments[url_segments.length -1]

	$('#upload').modal('show');

	$.ajax({
		xhr: function() {
			var xhr = new window.XMLHttpRequest();

			xhr.upload.addEventListener("progress", function(evt) {
				if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					percentComplete = parseInt(percentComplete * 100);

					$('.progress-bar').css({ 'width' : percentComplete + '%' })

					if (percentComplete === 100) {
						//$('#upload').modal('hide');
					}
				}
			}, false);

			return xhr;
		},
		url: slug +'/upload',
		type: "POST",
		data: formdata,
		//contentType: "application/json",
		dataType: "json",
		processData: false,
		contentType: false,
		success: function(result) {
			if (result.upload_limit_reached != 'true') {
				var upload_success = '<div class="alert alert-success">' + result.uploaded + ' photos successfully uploaded.</div>';
				var upload_failed = (result.failed != '') ? '<div class="alert alert-danger">' + result.failed.join('<br>') + '</div>' : '';

				$('#upload .modal-title').html('Upload finished!');
				$('#upload .progress').toggle();
				$('#uploadmsg').html(upload_success + upload_failed);
				$('#upload .modal-footer').toggle();

				if (result.uploaded > 0) {
					$('#upload').on('hide.bs.modal', function() {
						location.reload();
					});
				}
			} else {
				alert('You can only upload ' + result.max_files + ' file(s) at a time.');
			}
		}
	});
}
