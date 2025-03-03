<?php

namespace App\Http\Controllers;

use App\Models\Valve;
use Illuminate\Http\Request;

class ValveController extends Controller
{
    public function index()
    {
        $rows = Valve::all();
        return view('valve.index', ['first' => $rows->first()->valve_id]);
    }

    public function show(string $v)
    {
        $rows = Valve::all();
        $valve = Valve::whereValveId($v)->first();
        return view('valve.show', ['valves' => $rows, 'expanded' => $valve]);
    }
}
