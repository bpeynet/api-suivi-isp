<?php

namespace App\Http\Controllers;

use App\Models\Jalon;

class JalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return Jalon::all();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Jalon $jalon)
    {
        return $jalon;
    }
}
