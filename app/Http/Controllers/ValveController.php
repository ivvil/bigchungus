<?php

namespace App\Http\Controllers;

use App\Models\Valve;
use Illuminate\Http\Request;

class ValveController extends Controller
{
    public function index()
    {
        $rows = Valve::all();
        return view('valve.index', ['valves' => $rows]);
    }

    public function show(Valve $v)
    {
        $rows = Valve::all();
        return view('valve.show', ['valves' => [$rows], 'expanded' => $v]);
    }
}
