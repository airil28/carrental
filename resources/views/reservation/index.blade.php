@extends('layouts.header')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <p class="text-center m-4" style="font-weight: bold;">RENT FORM FOR : <span class="text-primary">{{ $vehicle->name }}</span></p>
    <form action="{{ route('reservations.store', ['vehicle' => $vehicle->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="payment_receipt">Payment Receipt (PDF, Image, etc.)</label>
            <input type="file" class="form-control" id="payment_receipt" name="payment_receipt" required>
        </div

        <!-- You can add more form fields here, if needed. -->

        <button type="submit" class="btn btn-primary">Submit Reservation</button>
    </form>



</div>
@endsection


