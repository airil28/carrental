<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
class RenterController extends Controller
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
        $data = Vehicle::with('owner')->get();
        return view('renter/dashboard', compact('data'));
    }

    public function showRentedVehicle()
    {
        $userId = auth()->id();

        $reservations = Reservation::with('vehicle')->where('renter_id', $userId)->get();

        $data = [];

        foreach ($reservations as $reservation) {
            $vehicleData = $reservation->vehicle->toArray(); // Convert vehicle data to an array
            $vehicleData['start_date'] = $reservation->start_date; // Include start_date
            $vehicleData['end_date'] = $reservation->end_date; // Include end_date
            $vehicleData['payment_received'] = $reservation->payment_received; // Include end_date

            // Include the owner's name from the 'User' table
            $owner = User::find($vehicleData['owner_id']);
            $vehicleData['owner_name'] = $owner->name;

            $data[] = $vehicleData;
        }
// dd($data);
        return view('renter/rented', compact('data'));
    }





}
