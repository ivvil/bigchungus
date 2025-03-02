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
        $rows = Zone::all();
        return view('zone.index', ['zones' => $rows]);
    }
}
