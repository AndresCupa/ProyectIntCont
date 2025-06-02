<?php

namespace App\Http\Controllers;

use App\Models\Dptos;
use App\Http\Requests\StoreDptosRequest;
use App\Http\Requests\UpdateDptosRequest;

class DptosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDptosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDptosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dptos  $dptos
     * @return \Illuminate\Http\Response
     */
    public function show(Dptos $dptos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dptos  $dptos
     * @return \Illuminate\Http\Response
     */
    public function edit(Dptos $dptos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDptosRequest  $request
     * @param  \App\Models\Dptos  $dptos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDptosRequest $request, Dptos $dptos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dptos  $dptos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dptos $dptos)
    {
        //
    }
}
