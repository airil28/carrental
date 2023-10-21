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

    <a class="btn btn-primary m-2" href="{{ route('rented-vehicle') }}">
        Rented Vehicle
    </a>
    <caption class="text-center">ALL CAR LIST</caption>

    @if($data)
    <table id="datatable" class="table table-bordered table-light border-rounded">
        <thead>
            <tr>
                <th>Vehicle Owner</th>
                <th>Car Name</th>
                <th>Daily Rental Price</th>
                <th>Promotional Discount</th>
                <th>Car Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $vehicle)
            <tr>
                <td>{{ $vehicle->owner->name }}</td>
                <td>{{ $vehicle->name }}</td>
                <td>{{ $vehicle->daily_rental_price }}</td>
                <td>{{ $vehicle->promotional_discount }}</td>
                <td>{{ $vehicle->type }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('reserve-form', $vehicle->id) }}">
                        BOOK VEHICLE
                    </a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>
        NO DATA
    </div>
    @endif

</div>
@endsection


