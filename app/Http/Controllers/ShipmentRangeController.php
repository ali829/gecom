<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShipmentRange;

class ShipmentRangeController extends Controller
{
    public function store(Request $request)
    {
        return ShipmentRange::create($request->all())->load('destinations');
    }

    public function update_destination_price(Request $request)
    {
        $sr = ShipmentRange::findOrFail($request->shipment_range_id);

        $sr->destinations()->sync([
            $request->destination_id => ['price' => $request->price]
        ], false);

        return $sr->destinations()->find($request->destination_id)->pivot;
    }

    public function destroy($id)
    {
        // TODO
    }
}
