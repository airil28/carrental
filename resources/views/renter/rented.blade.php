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

    <a class="btn btn-danger m-2" href="{{ route('renter.dashboard') }}">
        Back
    </a>
    @if($data)
    <caption class="text-center">RESERVED CAR LIST</caption>

    <table id="datatable" class="table table-bordered table-light border-rounded">
        <thead>
            <tr>
                <th>Vehicle Owner</th>
                <th>Car Name</th>
                <th>Daily Rental Price</th>
                <th>Promotional Discount</th>
                <th>Car Type</th>
                <th>Date From</th>
                <th>Date From</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $vehicle)
           {{-- @dd($vehicle) --}}
            <tr>
                <td>{{ $vehicle['owner_name'] }}</td>
                <td>{{ $vehicle['name'] }}</td>
                <td>{{ $vehicle['daily_rental_price'] }}</td>
                <td>{{ $vehicle['promotional_discount'] }}</td>
                <td>{{ $vehicle['type'] }}</td>
                <td>{{ $vehicle['start_date'] }}</td>
                <td>{{ $vehicle['end_date'] }}</td>
                <td class="{{ $vehicle['payment_received'] == 1 ? 'bg-success' : 'bg-danger' }}">
                    {{ $vehicle['payment_received'] == 1 ? 'Received' : 'Not Received' }}
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


