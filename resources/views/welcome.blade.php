<!doctype html>
<html>
<head lang="{{ config('app.locale') }}">
	<meta charset="UTF-8">

<meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="When Great Minds Don’t Think Alike" />
<meta property="og:description"        content="How much does culture influence creative thinking?" />
<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />




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
	<link rel="stylesheet" type="text/css" href="fonts/style.css">
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
				<p class="clari">Consumimos 7 lt de <b>agua</b> por minuto de ducha, según un cálculo conservador de <span>Sedapal</span> </p>

				<ul class="social-bar hidden-sm hidden-xs">
                <li>
                    <a href="" target="_BLANK" class="btn btn-default btn-inverse">
                        <i class="ico icon-facebook"></i>
                    </a>
                </li>
                <li><a href="" target="_BLANK" class="btn btn-default">
                        <i class="ico icon-twitter"></i>
                    </a></li>
          </ul>


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
		<button id="rank1">Ranking de consumo (promedio) de agua por persona al día</button>
		<button id="rank2">Ranking de % de usuarios con medidor activo</button>
	</div>

<div id ="rankOne" style="display:block" >
	<svg class="chart"  height="{{count($districts)*26.2}}">

		@foreach ($districts as $key=>$d)

		<g transform="translate(0,{{$key*26}})" >

			<text id="districtGraph"  y="8" fill="red" dy=".35em"><tspan x="29.5%" text-anchor="end">{{$d->name}}</tspan> </text>


			<rect width="{{$d->consumption*0.14}}%" x=30.5% height="14"></rect>
			<text id="valueGraph" x="{{$d->consumption*0.14+31}}%" y="6" fill="red" dy=".35em" >{{$d->consumption}} lts.</text>

		</g>

		@endforeach

	</svg>
</div>

<div  id="rankTwo" style="display:none">
	<svg class="chart"  id ="chartTwo" height="{{count($micromeditions)*26.2}}">

		@foreach ($micromeditions as $key=>$d)




		<g transform="translate(0,{{$key*26}})">

			<text id="districtGraph2"  y="8" fill="red" dy=".35em"><tspan x="29.5%" text-anchor="end">{{$d->name}}</tspan></text>

			<rect width="{{floatval($d->micromedition)*0.4}}%" x=30.5%  height="14"></rect>
			<text id="valueGraph2" x="{{floatval($d->micromedition)*0.4+31}}%" y="7" fill="red" dy=".35em" >{{number_format(floatval($d->micromedition),2)}}%</text>

		</g>

		@endforeach

	</svg>
</div>






	</div>
	<br><br><br>
	<div id="footerOne" class="col-md-12 col-xs-12">
	  <p>
	    <b>Fuentes y/o observaciones:</b> 1. Sedapal, al calcular un consumo de 7 litros por minuto de ducha, consideró distintos tipos de llave así como que el usuario la cierra mientras se enjabona. Por esto último, hablamos de un cálculo conservador. 2. Los datos de consumo de agua fueron proporcionados por la Superintendencia Nacional de Servicios de Saneamiento (SUNASS), a la que Sedapal remite información periódica. Los datos corresponden a abril de 2017. El proceso de validación de esta información, de parte de la SUNASS, concluirá a fines de setiembre aproximadamente, según el regulador.
	  </p>
	</div>

	<div id ="footerTwo" class="col-md-12 col-xs-12">
	    <p>
	      <b >Créditos: </b>Idea: Elizabeth Lama y Luisa García. Coordinación: Luisa García. Desarrollo: Álvaro Rodrigo Picho. Agradecimientos a: Fabiola Torres y Jorge Miranda.
	    </p>
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
