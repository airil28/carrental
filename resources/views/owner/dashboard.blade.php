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

    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#addCarModal">
        Add Vehicle
    </button>
      <div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCarModalLabel">Add Vehicle</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('vehicle.store') }}" method="post">
                @csrf

                <div class="mb-3">
                  <label for="name" class="form-label">Vehicle Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                  <label for="car_image" class="form-label">Vehicle Image</label>
                  <input type="file" class="form-control" id="car_image" name="car_image">
                </div>

                <div class="mb-3">
                  <label for="day_rate" class="form-label">Day Rate</label>
                  <input type="number" class="form-control" id="day_rate" name="day_rate">
                </div>

                <div class="mb-3">
                  <label for="discount" class="form-label">Discount</label>
                  <input type="number" class="form-control" id="discount" name="discount">
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Address Pickup</label>
                  <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="mb-3">
                  <label for="type" class="form-label">Type</label>
                  <input type="text" class="form-control" id="type" name="type">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      @if($data)
        <table id="datatable" class="table table-bordered table-light border-rounded">
            <thead>
                <tr>
                    <th>ID</th>
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
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->name }}</td>
                    <td>{{ $vehicle->daily_rental_price }}</td>
                    <td>{{ $vehicle->promotional_discount }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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


