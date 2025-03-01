<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Zone;

class ZoneController extends Controller
{
    public function index()
    {
        $fields = Schema::getColumnListing('zones');
        $rows = Zone::select($fields)->get();
        return view('zone.index', compact('zones', $rows));
    }
}
