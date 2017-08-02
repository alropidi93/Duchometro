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
	<div class="container">
		<div class="row">
			<div class="col-md-7 right">
				<h1>
					<img src="img/shower.png">
					<span id="temperature"><i class="fa fa-tint" aria-hidden="true"></i>078<span>Lts</span></span>
					Duchómetro Limeño<br>
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

							@foreach ($districts as $d)
							<div class="option" value="{{$d->id}}">{{$d->name}}</div>

							@endforeach

						</div>

					</div>
					<p class="question">
						¿Cuántos minutos demoras en bañarte?
					</p>
					<div class="field field2" d-hide="1">
						<input id="minutes" type="number"  min="1" max="1000" onkeydown="return false" placeholder="Ejemplo: 15">
					</div>
				</div>
				<button class="calcular">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
					Calcular
				</button>
				<p class="clari">* <span>No</span> guardamos su información</p>
			</div>
		</div>
	</div>

	<div class="data">
		<div class="container">
			<i class="fa fa-times cerrar" aria-hidden="true"></i>
			<div class="row description">
				<div class="col-md-3">
					<img src="img/drop.png">
					<h2>150</h2>
					<p class="bte">litros de agua en<br><span id="min"></span><br>de ducha</p>
				</div>
				<div class="col-md-5">
					<img src="img/drop.png"><img src="img/drop.png"><img src="img/drop.png"><br><br>
					Tu ducha excedió el consumo diario de agua en estos distritos
				</div>
				<div class="col-md-4 tright">
					Haz utilizado el <span>28<sup>%</sup></span> de lo que gasta una persona en <div id="district"></div> al día (366.7 lt)
				</div>


			</div>
		</div>
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
