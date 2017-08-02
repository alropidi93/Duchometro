$( document ).ready(function() {
	setTimeout(function(){
		$('.logo').fadeOut(function(){
			$('.animbot, .animtop').animate({
				height: '0px'
			},'slow');
			$('.left').animate({
				opacity: 1
			},1000);
		});
	}, 700);
});


$('.calcular').click(function(){
	var id_district, minutes;
	id_district=$(this).parent().parent().find('.sel').attr('id');
  minutes=$("#minutes").val()
	//console.log(id_district);

	$.ajax({
	       url: "/reporte", //nueva url
	       //url: "http://absortio.herokuapp.com/password/email",
	       //headers: {'X-CSRF-TOKEN': $('[name="_token"]').val()},

	       type:"GET",
	       datatype:"json",
	       data: {

	         district:id_district,
					 minutes:minutes

	       },
	       success: function(data){
					 console.log(data['nombre']);
					 document.getElementById("min").innerHTML = data['min'] + " minutos.";
					 document.getElementById("district").innerHTML=data['nombre'];

	       },

	       error: function() {
					 console.log('Error');

					 //mandar un mensaje diciendo que hubo un error con el servidor



	          }
	       });












	$('.animbot, .animtop').animate({
		height: '10%'
	}, 'fast', function(){
		//$('.cover').hide();
		$('.data').slideDown('fast');
	});


});

$('.cerrar').click(function(){
	$('.data').fadeOut('50',function(){
		$('.cover').show();
		$('.animbot, .animtop').animate({
			height: '0px'
		},'slow');
	});
})
