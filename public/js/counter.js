var count = 78;
var ms = 200;
var step = 5;
var counter=setTimeout(timer, ms); //1000 will  run it every 1 second
var show, color;
var countstep = 2;
function timer()
{
	count=count+countstep;

	if (countstep > 0 && count < 400)
	{
		color = '#467FFF';
		ms = ms - step;
		countstep = 2;
	}
	else if( count > 78 ){
		countstep = -2;
		ms = ms + step;
	} else {
		countstep = 2;
		ms = 200;
	}
	var show = (count<100?count<10?'00':'0':'')+count;
	if( count > 150 ) color = '#FF3C3A';
	else color = '#467FFF';
	$('#temperature').html('<i class="fa fa-tint" aria-hidden="true"></i>'+show+"<span>Lts</span>").css('color',color) ; // watch for spelling
	counter = setTimeout(timer, ms);
}