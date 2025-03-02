<?php

namespace App\Http\Controllers;

use App\Models\Valve;
use Illuminate\Http\Request;

class ValveController extends Controller
{
    public function index()
    {
        $rows = Valve::all();
    }
}
