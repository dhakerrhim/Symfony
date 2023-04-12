$(function () {
	'use strict'

	$('#wizard1').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>'
	});

	$('#wizard3').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		stepsOrientation: 1
	});

	//fancyfileuplod
	$('#demo').FancyFileUpload({
		params: {
			action: 'fileuploader'
		},
		maxfilesize: 1000000
	});
	$('.dropify').dropify({
		messages: {
			'default': 'Drag and drop a file here or click',
			'replace': 'Drag and drop or click to replace',
			'remove': 'Remove',
			'error': 'Ooops, something wrong appended.'
		},
		error: {
			'fileSize': 'The file size is too big (2M max).'
		}
	});
		
	
	$('.dropify-clear').click(function () {
		$('.dropify-render img').remove();
		$(".dropify-preview").css("display", "none");
		$(".dropify-clear").css("display", "none");
	});

	//accordion-wizard
	var options = {
		mode: 'wizard',
		autoButtonsNextClass: 'btn btn-primary float-end',
		autoButtonsPrevClass: 'btn btn-secondary',
		stepNumberClass: 'badge bg-primary me-1',
		onSubmit: function () {
			alert('Form submitted!');
			return true;
		}
	}
	$("#form").accWizard(options);

	let dropify = document.querySelector('.dropify-readurl');
	if (dropify) {
		dropify.addEventListener('change', readURL)
	}
});

//Function to show image before upload

function readURL(input) {
	input = this
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('.dropify-render img').remove();
			var img = $('<img id="dropify-img">'); //Equivalent: $(document.createElement('img'))
			img.attr('src', e.target.result);
			img.appendTo('.dropify-render');
			$(".dropify-preview").css("display", "block");
			$(".dropify-clear").css("display", "block");
		};
		reader.readAsDataURL(input.files[0]);
	}
}