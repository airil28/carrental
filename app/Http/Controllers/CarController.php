<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
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
    {   $data = Car::all();
        return view('car', compact('data'));
        // return view('owner');

    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->car_name = $request->input('car_name');
        $car->car_image = $request->file('car_image');
        $car->day_rate = $request->input('day_rate');
        $car->discount = $request->input('discount');
        $car->description = $request->input('description');
        $car->bank_number = $request->input('bank_number');
        $car->bank_name = $request->input('bank_name');
        $car->address_pickup = $request->input('address_pickup');
        $car->car_type = $request->input('car_type');
        $car->save();

        return redirect()->route('owner');
    }

    public function getCarData()
    {
        $data = Car::all();
        return response()->json($data);

    }

}
