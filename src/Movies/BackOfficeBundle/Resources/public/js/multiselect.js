$(document).ready(function() {
	$('#form_acteurs').multiselect({
		enableFiltering: true,
		nonSelectedText: 'Sélectionner les acteurs'
	});
	$('#form_genres').multiselect({
		enableFiltering: true,
		nonSelectedText: 'Sélectionner les genres'
	});
	
	$('#form_realisateur').select();
	$('#form_image').bootstrapFileInput();
	$('#form_file').bootstrapFileInput();
	$('aside').css('left',($('form.form-horizontal').width()-250))
});
