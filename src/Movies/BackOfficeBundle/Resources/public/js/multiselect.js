$(document).ready(function() {
	$('#form_acteur').multiselect({
		enableFiltering: true,
		nonSelectedText: 'Sélectionner les acteurs'
	});
	$('#form_image').bootstrapFileInput();
	$('#form_file').bootstrapFileInput();
	$('aside').css('left',($('form.form-horizontal').width()-250))
});
