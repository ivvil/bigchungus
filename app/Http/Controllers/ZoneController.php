<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneStoreRequest;
use App\Models\Valve;
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

    public function create()
    {
        $valves = Valve::all();
        return view('zone.create', ['valves' => $valves]);
    }

    public function store(ZoneStoreRequest $req)
    {
        $data = $req->validated();

        $zone = Zone::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        if ($req->has('valves')) {
            $zone->valves()->sync($data['valves']);
        }

        $zone->save();

        return redirect()->route('zones.index');
    }
}
