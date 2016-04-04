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
	uploadPic($('#formupload').serialize());
});

function uploadPic(files) {
	//var files = $('#albumpic').files.length;
	alert(files);
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
					console.log(percentComplete);

					if (percentComplete === 100) {

					}
				}
			}, false);

			return xhr;
		},
		url: 'upload',
		type: "POST",
		enctype: 'multipart/form-data',
		//data: JSON.stringify(files[0]),
		data: { 'albumpic' : files, 'slug' : slug },
		contentType: "application/json",
		dataType: "json",
		success: function(result) {
			console.log(result);
		}
	});
}