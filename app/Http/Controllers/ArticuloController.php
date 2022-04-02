<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $paginaDato['articulo']=Articulo::paginate(6);
        $articulos = Articulo::all();
        return view('articulo.index')->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campo=[
            'codigo'=>'required|atring|max:100',
            'descripcion'=>'required|atring|max:100',
            'cantidad'=>'required|numeric',
            'precio'=>'required|numeric'
        ];
        // $this->validate($request,$campo);
       
        $datoArticulo = request()->except('_token');

        Articulo::insert($datoArticulo );
        // return response()->json($datoArticulo);
         return redirect('/articulo');
       
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
        $articulo = Articulo::findOrFail($id);
        return view('articulo.edit')->with('articulo',$articulo);

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

        $articulo = request()->except('_token','_method');

        Articulo::where('id','=',$id)->update($articulo);
      
         return redirect('/articulo');
         

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
        Articulo::destroy($id);

        return redirect('articulo');

    }
}
