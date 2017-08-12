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
						<input id="minutes" type="number"   autocomplete="off" placeholder="Ej: 15">
					</div>
				</div>
				<button class="calcular">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
					Calcular
				</button>
				<p class="clari">* <span>No</span> guardamos su información</p>
			</div>
		</div>

		<div class="arrow" >
		<a class="arrow-img" id="arrow" href="#data_div"><img id="img-arrow" src="img\blue_arrow.png" ></a>
		</div>


	<div class="data" id ="data_div">
		<div class="container">

			<div id="text1">
				<div id="mess2">
					Has utilizado el <span ><b id="porc"></b>%
					</span> de lo que gasta una persona en <b id="district"></b> al día (<b id="consume"></b> lt), en promedio.

				</div>

			</div>



			<div class="contenedor">
				<div id="text2" >

					<b id="mess"></b>
				</div>
				<div class="drop">
					<img id="gota"  src="">
				</div>
			</div>




		</div>






<div class="rank">
	<div class="tab">
		<button id="rank1">

			Ranking de consumo (promedio) de agua por persona al día
		</button>
		<button id="rank2">

			 Ranking de facturacion promedio por conexión formal
		</button>
	</div>

<div id ="rankOne" style="display:block" >
	<svg class="chart"  height="{{count($districts)*26.2}}">

		@foreach ($districts as $key=>$d)

		<g transform="translate(0,{{$key*26}})" >

			<text id="districtGraph" x=0 y="12" fill="red" dy=".35em">{{$d->name}} </text>


			<rect width="{{$d->consumption*0.14}}%" x=29% height="14"></rect>
			<text id="valueGraph" x="{{$d->consumption*0.14+30}}%" y="8" fill="red" dy=".35em" >{{$d->consumption}} lts.</text>

		</g>

		@endforeach

	</svg>
</div>

<div  id="rankTwo" style="display:none">
	<svg class="chart"  height="{{count($facturations)*26.2}}">

		@foreach ($facturations as $key=>$d)




		<g transform="translate(0,{{$key*26}})">

			<text id="districtGraph2" textLenght="100%" x=0 y="12" fill="red" dy=".35em">{{$d->name}} </text>

			<rect width="{{$d->facturation*0.14}}%" x=29% height="14"></rect>
			<text id="valueGraph2" x="{{$d->facturation*0.14+30}}%" y="8" fill="red" dy=".35em" >{{"S/. ".number_format($d->facturation,2)}}</text>

		</g>

		@endforeach

	</svg>
</div>
<h4 class="title">Fuente: Superintendencia Nacional de Servicios de Saneamiento (SUNASS)</h4>
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
