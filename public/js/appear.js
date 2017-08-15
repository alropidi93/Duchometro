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

$('#rank1').click(function(){
	 document.getElementById("rankOne").setAttribute("style","display:block");
	 document.getElementById("rankTwo").setAttribute("style","display:none");
});
$('#rank2').click(function(){
	document.getElementById("rankTwo").setAttribute("style","display:block");
	document.getElementById("rankOne").setAttribute("style","display:none");

});

$('#rank2').mouseover(function(){
	console.log("encima de rank2");
	document.getElementById("rank2").style.background="#ff5274";//aclaramos el guinda


});
$('#rank2').mouseout(function(){
	document.getElementById("rank2").style.background="#DC143C";//volvemos al guinda normal
});

$('#rank1').mouseover(function(){
	console.log("encima de rank1");
	document.getElementById("rank1").style.background="#7ea0ef";//aclaramos el azul


});
$('#rank1').mouseout(function(){
	document.getElementById("rank1").style.background="#467FFF";//volcemos al azul normal
});
	//document.getElementById("rankTwo").setAttribute("style","display:block");
	//document.getElementById("rankOne").setAttribute("style","display:none");




$('.calcular').click(function(){

	var id_district, minutes,name;
	id_district=$(this).parent().parent().find('.sel').attr('id');
	name=$(this).parent().parent().find('.sel').html();
  minutes=$("#minutes").val();




	if (name=="Seleccionar"){
		document.getElementById("field_required").innerHTML ="Elija un distrito";
	}
	else if (!minutes){
		document.getElementById("field_required").innerHTML ="";
		$("#minutes").attr('placeholder','Ingrese un valor');
	}
	else{
		document.getElementById("field_required").innerHTML ="";
		minutes=Number(minutes);
		minutes=Math.round(minutes) ;
		if (minutes<0 || minutes>100 ){
			$("#minutes").val("");
			$("#minutes").attr('placeholder','Ingrese un valor válido');
		}
		else {
			document.getElementById("field_required").innerHTML ="";
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
							 var count = 0;
							 var ms = 100;
							 var step = 5;
							 var counter=setTimeout(timer, ms); //1000 will  run it every 1 second
							 var show, color;
							 var countstep = 1;
							 function timer()
							 {
							 	count=count+countstep;

							 	if (countstep > 0 && count < data['litros'])
							 	{
							 		color = '#467FFF';
							 		ms = ms - step;

							 		//countstep = 2;
							 	}
							 	else if( count > 78 ){
							 		//countstep = -2;
							 		ms = ms + step;
							 	} else {
							 		countstep = 2;
							 		ms = 150;
							 	}
							 	//var show = (count<100?count<10?'00':'0':'')+count;
								var show = (count<100?count<10?'00':'0':'')+count;
							 	if( count > 150 ) color = '#DC143C'; //color guinda
							 	else color = '#467FFF';//color azul
							 	$('#temperature').html('<i class="fa fa-tint" aria-hidden="true"></i>'+show+"<span>Lts</span>").css('color',color) ; // watch for spelling
								if (Number(show)==data['litros']) return;
								counter = setTimeout(timer, ms);
							 }


							 //document.getElementById("min").innerHTML = data['min'] + " minutos";
							 document.getElementById("district").innerHTML=data['nombre'];
							 document.getElementById("consume").innerHTML=data['consumo'];
							 //document.getElementById("liter").innerHTML=data['litros'];
							 document.getElementById("porc").innerHTML=data['porcentaje'];
							 document.getElementById("mess").innerHTML=data['mensaje'];


							  console.log(data['porcentajeMenor']);
								 if(data['porcentajeMenor']<=100)
								 {
									 if(data['porcentajeMenor']<=80)
									 {

											 if(data['porcentajeMenor']<=60)
											 {
												 if(data['porcentajeMenor']<=40)
												 {
													 document.getElementById("gota").setAttribute("src","img\\1.png");
												 }
												 else{
													 document.getElementById("gota").setAttribute("src","img\\2.png");
												 }
											 }
											 else{
												 	document.getElementById("gota").setAttribute("src","img\\3.png");
											 }



									 }
									 else{
										 	document.getElementById("gota").setAttribute("src","img\\4.png");
									 }
								 }
								 else{
									 document.getElementById("gota").setAttribute("src","img\\4.png");
								 }





							 $('.animbot, .animtop').animate({
						 		height: '10%'
						 	}, 'slow', function(){

						 		//$('.cover').hide();
						 		$('.arrow').slideDown('slow');

						 	});
			       },

			       error: function() {
							 console.log('Error');
							 alert("Server error");
							 //mandar un mensaje diciendo que hubo un error con el servidor

			          }
			       });
						 var objDiv = document.getElementById("divExample");



		}


	}

});

function transitionTo(elem){

    $('html, body').stop().animate({scrollTop: $(elem).offset().top

    }, 1000, function ()  {


    });
}

animacion = function(){

  document.getElementById('arrow').classList.toggle('fade');
}

setInterval(animacion, 500);

$('.arrow-img').click(function(e){
	e.preventDefault();
	$('.animbot, .animtop').animate({
	 height: '10%'
 }, 'slow', function(){

	 //$('.cover').hide();
	 $('.data').slideDown('slow');
	 transitionTo('#data_div');

 });





});



$('#minutes').keypress(function(e) {
		//console.log(e.which);
		//evitamos que e + - . se presionen
		if(e.which === 101 ||e.which === 43|| e.which === 45 || e.which === 46) {
        e.preventDefault();
        return;
    }

});

$('.cerrar').click(function(){
	$('.data').fadeOut('50',function(){
		$('.cover').show();
		$('.animbot, .animtop').animate({
			height: '0px'
		},'slow');
	});
});
