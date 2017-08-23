var count = 78;
var ms = 200;
var step = 1;
var counter=setTimeout(changeColor, 1000); //1000 will  run it every 1 second
var  color;
var countstep = 1;
function changeColor()
{
	count=count+countstep;

	if (countstep > 0 && count < 200)
	{
		color = '#008744'; //verde
		//ms = ms - step;
		countstep = 1;
	}
	else if( count >100 ){
		countstep = -1;
		//ms = ms + step;
	} else {
		countstep = 2;
		//ms = 200;
	}

	if( count % 3 == 0 ) color = '#008744';//verde
	else if ((count-1) %3==0) color = '#f7da19';//amarillo
  else if ((count-2) %3==0) color = '#d62d20';//rojo

	$('#little-drop').html('').css('color',color) ; // watch for spelling
	counter = setTimeout(changeColor, 1000);
}
