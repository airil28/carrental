<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <!-- Include Bootstrap 4 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5">
        <div class="container text-center">
            <h1>Welcome to Car Rental</h1>
            <p>Your destination for affordable and reliable car rentals.</p>
            {{-- <a href="#" class="btn btn-light btn-lg">View Cars</a> --}}
            @if (Route::has('login'))
            <div class="text-center" style=" padding: 10px;">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary text-white mx-2">Home</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary text-white mx-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary text-white mx-2">Register</a>
                    @endif
                @endauth
            </div>


        @endif
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature text-center">
                        <i class="fa fa-calendar"></i>
                        <h3>Flexible Booking</h3>
                        <p>Book your car for the dates that suit you.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature text-center">
                        <i class="fa fa-usd"></i>
                        <h3>Affordable Prices</h3>
                        <p>Great rates on a wide range of vehicles.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature text-center">
                        <i class="fa fa-cogs"></i>
                        <h3>Easy to Use</h3>
                        <p>Simple and user-friendly booking process.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials bg-light py-5">
        <div class="container">
            <h2 class="text-center">What Our Customers Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial text-center">
                        <p>"Great experience! The car was clean and in excellent condition."</p>
                        <cite>- John Doe</cite>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial text-center">
                        <p>"Affordable prices and friendly staff. I highly recommend it!"</p>
                        <cite>- Jane Smith</cite>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial text-center">
                        <p>"I've used Car Rental multiple times, and it never disappoints."</p>
                        <cite>- David Johnson</cite>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Bootstrap 4 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
