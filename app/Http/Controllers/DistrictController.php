<?php

namespace App\Http\Controllers;
use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$districts=District::All();
        $districts= District::orderBy('consumption', 'ASC')->orderBy('name', 'ASC')->get();
        $names= District::orderBy('name', 'ASC')->get();
        //return compact('districts');
        // $districts[0];
        return view('welcome',compact('districts'),compact('names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_Report(Request $request)
    {
        //recibe ajax
        //$min=$request['minutes'];
        //$id=$request['district'];
        //$district= District::find($id);
        //return( array('nombre' => $district['name'],'continuidad' => $district['continuity']
        //,'consumo' => $district['consumption'],'micromedicion' => $district['micromedition'],
        //'facturacion' => $district['facturation'],'min'=>$min));

        $id=$request['district'];
        $minutes=$request['minutes'];

        $district= District::find($id);

        $districtRank=District::orderBy('consumption', 'ASC')->get();
        $liters=$minutes*7;

        $cont=0;

        foreach ($districtRank as $d) {
          if ($liters>$d['consumption']){
            $cont++;
          }
          else break;
        }

        $consume=$district['consumption'];


        //$message="Hola";
        $porcentaje= round(($liters/$consume)*100);


        if ($cont==0) {
          $message= "Tu ducha no superó el consumo (promedio) de agua de ningún distrito.";
        }
        else if ($cont==1){
          $message= "Tu ducha excedió el consumo diario (promedio) de agua en 1 distrito: ".$districtRank[0]['name'].".";
        }
        else if ($cont==2){
          $message= "Tu ducha excedió el consumo diario (promedio) de agua en 2 distritos: ".
                $districtRank[0]['name']." y ".  $districtRank[1]['name'].".";
        }
        else if ($cont==3){
          $message= "Tu ducha excedió el consumo diario (promedio) de agua en 3 distritos: "
            .$districtRank[0]['name'].", ". $districtRank[1]['name']." y ".$districtRank[2]['name'].".";
        }
        else if ($cont==4){
          $message= "Tu ducha excedió el consumo diario (promedio) de agua en 4 distritos: "
            .$districtRank[0]['name'].", ". $districtRank[1]['name']." y ".$districtRank[2]['name'].", por ejemplo.";
        }
        else {
          $message= "Tu ducha excedió el consumo diario (promedio) de agua en más de 4 distritos: "
            .$districtRank[0]['name'].", ". $districtRank[1]['name']." y ".$districtRank[2]['name'].", por ejemplo.";
        }




        $data['min']=$minutes;
        $data['litros']=$liters;
        $data['mensaje']=$message;
        $data['porcentaje']=$porcentaje;
        $data['nombre']=$district['name'];
        $data['consumo']=$consume;

        //$data['continuidad']=$district['continuity'];

        //$data['micromedicion']=$district['micromedition'];
        //$data['facturacion']=$district['facturation'];

        return $data;

    }

    public function insert_Data()
    {
        //

        $string=file_get_contents('D:\Alvaro\Documents\Absortio\Pagina web luisa\water\data\data.json');
        $json= json_decode($string,true);
        return $json;
        // tengo los datos en json


        foreach ($json as $key => $value)
        {
            District::create([
              'name'=> $value['distrito'],
              'continuity'=>$value['continuidad'],
              'consumption'=>$value['consumo'],
              'micromedition'=>$value['micromedición'],
              'facturation'=>$value['facturación'],

            ]);



        }

        //return $json[0]["micromedición"];
    }
}
