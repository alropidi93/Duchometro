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
        $districts= District::orderBy('name', 'ASC')->get();
        //return compact('districts');
        // $districts[0];
        return view('welcome',compact('districts'));
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

        $district= District::find($id);

        $data['min']=$request['minutes'];
        $data['nombre']=$district['name'];
        $data['continuidad']=$district['continuity'];
        $data['consumo']=$district['consumption'];
        $data['micromedicion']=$district['micromedition'];
        $data['facturacion']=$district['facturation'];

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
