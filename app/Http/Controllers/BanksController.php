<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBanksRequest;
use App\Http\Requests\UpdateBanksRequest;
use App\Models\Banks;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Banks::all();
        return $collections;
    }
}
