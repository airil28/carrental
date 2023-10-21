@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary justify-end" data-bs-toggle="modal" data-bs-target="#addCarModal">
        Add Car
    </button>

      <div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCarModalLabel">Add Car</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('cars.store') }}" method="post">
                @csrf

                <div class="mb-3">
                  <label for="car_name" class="form-label">Car Name</label>
                  <input type="text" class="form-control" id="car_name" name="car_name">
                </div>

                <div class="mb-3">
                  <label for="car_image" class="form-label">Car Image</label>
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
                  <label for="bank_number" class="form-label">Bank Number</label>
                  <input type="number" class="form-control" id="bank_number" name="bank_number">
                </div>

                <div class="mb-3">
                  <label for="bank_name" class="form-label">Bank Name</label>
                  <input type="text" class="form-control" id="bank_name" name="bank_name">
                </div>

                <div class="mb-3">
                  <label for="address_pickup" class="form-label">Address Pickup</label>
                  <input type="text" class="form-control" id="address_pickup" name="address_pickup">
                </div>

                <div class="mb-3">
                  <label for="car_type" class="form-label">Car Type</label>
                  <input type="text" class="form-control" id="car_type" name="car_type">
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
      <table id="datatable" class="table table-bordered table-light border-rounded">
        <thead class="thead-dark">
            <tr>
                <th>Car Name</th>
                <th>Car Images</th>
                <th>Car Type</th>
                <th>Day Rate(RM)</th>
                <th>Discount Percent</th>
                <th>Bank Name</th>
                <th>Desc</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            "ajax": {
                "url": "get-car-data",
                "dataSrc": ""
            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "email" }
            ]
        });
    });
</script>

