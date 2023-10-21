<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Vehicle::all();
        return view('car', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $car = new Vehicle();
            $car->name = $request->input('name');
            // $car->car_image = $request->file('car_image');
            $car->daily_rental_price = $request->input('day_rate');
            $car->promotional_discount = $request->input('discount');
            $car->description = $request->input('description');
            $car->address = $request->input('address');
            $car->type = $request->input('type');
            $car->owner_id = auth()->user()->id;
            $car->save();

            return back()->with('success', 'Car added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to add car: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return back()->with('error', 'Vehicle not found.');
        }

        $vehicle->delete();

        return back()->with('success', 'Vehicle deleted successfully.');
    }

}
