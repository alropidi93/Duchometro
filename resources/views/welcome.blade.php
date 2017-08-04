<!doctype html>
<html>
<head lang="{{ config('app.locale') }}">
	<meta charset="UTF-8">
	<title>Water</title>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/data.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
</head>
<body>



<div class="cover">
	<div class="animbot"></div><div class="animtop"></div>
	<div >
		<div class="row">
			<div class="col-md-7 right">
				<h1>
					<img src="img/shower.png">
					<span id="temperature"><i class="fa fa-tint" aria-hidden="true"></i>000<span>Lts</span></span>
					Duchómetro limeño<br>
					<small>¿A cuánto equivale tu ducha?</small>
				</h1>
			</div>
			<div class="col-md-5 ">
				<div class="questions">
					<p class="question">
						¿En qué distrito vives?
					</p>

					<div class="field field1" d-hide="2">
						<span class="sel" id="distrito">Seleccionar</span>

						<i class="fa fa-chevron-down" aria-hidden="true"></i>

						<div class="options">

							@foreach ($names as $n)
							<div class="option" value="{{$n->id}}">{{$n->name}}</div>

							@endforeach

						</div>

					</div>
						<br>
						<strong id="field_required"></strong>

					<p class="question">
						¿Cuántos minutos demoras en bañarte?
					</p>
					<div class="field field2" d-hide="1">
						<input id="minutes" type="number"   placeholder="Ej: 15">
					</div>
				</div>
				<button class="calcular">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
					Calcular
				</button>
				<p class="clari">* <span>No</span> guardamos su información</p>
			</div>
		</div>
		<br><br><br><br>
		<div  class="arrow" style="display:none; vertical-align:top; margin: 0; text-align:center">
		<a class="arrow-img" id="arrow" href="#data_div"><img src="img\blue_arrow.png" style="height: 40px; padding-left: 10px"></a>
		</div>
	</div>
<br><br><br><br>
	<div class="data" id ="data_div">
		<div class="container">

			<div class="row description">

				<div class="col-md-6" style="float: left; width: 50%;text-align: center;">

					Has utilizado el <span ><b id="porc"></b>%</span> de lo que gasta,en promedio, una persona en <b id="district"></b> al día (<b id="consume"></b> lt).

				</div>
				<div class="col-md-6" style="float: left; width: 50%;text-align: center;">

					<b id="mess"></b>
				</div>


			</div>
		</div>

<h5 class="center title">Ranking de consumo de agua promedio por persona en cada distrito</h5><br><br>
		<svg class="chart" width="1300" height="{{count($districts)*26.2}}">

			@foreach ($districts as $key=>$d)

		  <g transform="translate(440,{{$key*26}})">
				<text x=-230 y="12" fill="red" dy=".35em" style="text-anchor: start;">{{$d->name}} </text>
		    <rect width="{{$d->consumption*2}}" height="14"></rect>
				<text x="{{$d->consumption*2+10}}" y="8" fill="red" dy=".35em" style="font: 10px Avenir-Medium;text-anchor: start;">{{$d->consumption}} lts.</text>

		  </g>

		  @endforeach

		</svg>

<h4 class="center title">Fuente: Sunass</h4> <br>


	</div>

</div>




<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/d3.js" type="text/javascript"></script>
<script src="js/counter.js" type="text/javascript"></script>
<script src="js/appear.js" type="text/javascript"></script>
<script src="js/options.js" type="text/javascript"></script>
<script src="js/json.js" type="text/javascript"></script>

</body>
</html>
