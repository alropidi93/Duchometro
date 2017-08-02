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

	var id_district, minutes,name;
	id_district=$(this).parent().parent().find('.sel').attr('id');
	name=$(this).parent().parent().find('.sel').html();
  minutes=$("#minutes").val();




	if (name=="Seleccionar"){
		document.getElementById("field_required").innerHTML ="Elija un distrito";
	}
	else if (!minutes){
		$("#minutes").attr('placeholder','Ingrese un valor');
	}
	else{
		minutes=Number(minutes);
		minutes=Math.round(minutes* 100) / 100;
		if (minutes<0 || minutes>1440){
			$("#minutes").val("");
			$("#minutes").attr('placeholder','Ingrese un valor válido');
		}
		else {
			document.getElementById("field_required").innerHTML =""
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
							 //console.log(data['nombre']);
							 document.getElementById("min").innerHTML = data['min'] + " minutos";
							 document.getElementById("district").innerHTML=data['nombre'];
							 document.getElementById("consume").innerHTML=data['consumo'];
							 document.getElementById("liter").innerHTML=data['litros'];
							 document.getElementById("porc").innerHTML=data['porcentaje'];
							 document.getElementById("mess").innerHTML=data['mensaje'];
			       },

			       error: function() {
							 console.log('Error');

							 //mandar un mensaje diciendo que hubo un error con el servidor



			          }
			       });

						 $('.animbot, .animtop').animate({
					 		height: '10%'
					 	}, 'slow', function(){
					 		//$('.cover').hide();
					 		$('.data').slideDown('slow',function(){$('#data_div').focus();});

					 	});

		}


	}







});

$('.cerrar').click(function(){
	$('.data').fadeOut('50',function(){
		$('.cover').show();
		$('.animbot, .animtop').animate({
			height: '0px'
		},'slow');
	});
})
