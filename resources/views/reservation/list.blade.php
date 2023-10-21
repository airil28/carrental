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
    <div class="d-flex justify-content-between">
        <a href="{{ route('vehicle_owner.dashboard') }}" class="btn btn-danger m-2">Back</a>

        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#addCarModal">
            Add Vehicle
        </button>
    </div>
    <caption class="text-center">OWNER CAR RESERVATION LIST</caption>

      @if($data)
        <table id="datatable" class="table table-bordered table-light border-rounded">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Payment Receipt</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $res)
                <tr>
                    <td>{{ $res->id }}</td>
                    <td>{{ $res->payment_receipt }}</td>
                    <td>{{ $res->start_date }}</td>
                    <td>{{ $res->end_date }}</td>
                    <td>
                        @if ($res->payment_received)
                            <span class="bg-success text-white p-2">Payment Confirmed</span>
                        @else
                            <form action="{{ route('confirm-payment', $res->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Confirm Payment</button>
                            </form>
                        @endif
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

