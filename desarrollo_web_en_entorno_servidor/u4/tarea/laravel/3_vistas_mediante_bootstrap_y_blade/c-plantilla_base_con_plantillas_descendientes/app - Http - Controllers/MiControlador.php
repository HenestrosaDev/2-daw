<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("welcome");
    }

    /**
     * Display the specified resource.
     */
    public function create()
    {
        return view("crear");
    }

    /**
     * Display the specified resource.
     */
    public function store()
    {
        return view("articulos");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view("mostrar");
    }

    public function showTemplateExample1()
    {
        return view("ejemplo-plantilla-1");
    }

    public function showTemplateExample2()
    {
        return view("ejemplo-plantilla-2");
    }
    
    public function showTemplateExample3() 
    {
        return view("ejemplo-plantilla-3");
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
}
