$('.field').click(function(){
	$(this).find('.options').slideToggle('fast');
	var d_hide = $(this).attr('d-hide')
	$('.field'+d_hide).find('.options').hide();
	event.stopPropagation();
})

$('.option').click(function(){
	var value = $(this).html();
	
	var id= $(this).attr('value');
	//console.log(id);
	//$(this).parent().parent().find('.sel').attr('id')=id;
	$(this).parent().parent().find('.sel').html(value);
	$(this).parent().parent().find('.sel').attr('id',id);
	//if (name!="Seleccionar"){
		document.getElementById("field_required").innerHTML ="";
	//}
})

$('html').click(function(){
	$(this).find('.options').slideUp('fast');
})
