<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValveStoreRequest;
use App\Models\Valve;
use App\Models\Zone;
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

    public function create()
    {
        $zones = Zone::all();
        return view('valve.create', ['zones' => $zones]);
    }

    public function store(ValveStoreRequest $req)
    {
        $data = $req->validated();

        $valve = Valve::create([
            'valve_id' => $data['id'],
            'location' => $data['location']
        ]);

        if ($req->has('zones')) {
            $valve->zones()->sync($data['zones']);
        }

        $valve->save();

        return redirect()->route('valve.index');
    }
}
