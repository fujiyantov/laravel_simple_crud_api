<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        $collections = Positions::all();
        return $collections;
    }
}
