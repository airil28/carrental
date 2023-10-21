<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use App\Models\User;

class ReservationController extends Controller
{
    public function showReservationForm($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);
        return view('reservation/index', compact('vehicle'));
    }

    public function confirmPayment(Reservation $reservation)
    {

        $reservation->payment_received = 1;
        $reservation->save();

        return redirect()->back()->with('success', 'Payment confirmed.');
    }

    public function reserve(Request $request, $vehicleId)
    {
        // Validate
        // $request->validate([
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date|after:start_date',
        //     'payment_receipt' => 'required',
        // ]);

        $renterId = auth()->user()->id;
        $email = auth()->user()->email;
        $vehicle = Vehicle::where('id',$vehicleId);
        $renter = User::where('id', $renterId);

        try {

            $reservation = new Reservation();
            $reservation->start_date = $request->input('start_date');
            $reservation->end_date = $request->input('end_date');
            $reservation->payment_receipt = $request->input('payment_receipt');
            $reservation->renter_id = $renterId;
            $reservation->vehicle_id = $vehicleId;
            $reservation->save();
            Mail::to($email)->send(new ReservationConfirmation($vehicle, $renter));

            return redirect()->route('renter.dashboard')->with('success', 'Reservation booked successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to reserve vehicle: ' . $e->getMessage());
        }

    }

    public function showReservation(){

        $id = auth()->user()->id;
        $user = User::find($id);
        $data = Reservation::whereHas('vehicle', function ($query) use ($user) {
            $query->where('owner_id', $user->id);
        })->get();
        // dd($data);
        return view('reservation/list', compact('data'));

    }
}
