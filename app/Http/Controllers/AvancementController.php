<?php

namespace App\Http\Controllers;

use App\Models\Avancement;

class AvancementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return Avancement::all();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Avancement $avancement)
    {
        return $avancement;
    }
}
