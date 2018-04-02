<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class AdminLocationsController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('suburb')->get();

        return view('admin.locations.index', compact('locations', $locations));
    }

    public function update(Request $request)
    {
        //dd($request->all());
        $locations = collect($request->locations);

        // Delete all locations before recreating
        Location::truncate();

        foreach ($locations as $l) {
            if (!empty($l['suburb']) && !empty($l['postcode'])) {
                Location::create([
                    'suburb' => $l['suburb'],
                    'postcode' => $l['postcode'],
                    'service_premium' => (float) $l['service_premium'],
                ]);
            }

        }
        flash('Location data updated');
        return redirect()->back();

    }
}
