@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('place-order') }}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-7">
			<div class="card">
				<div class="card-body">
				<h2>Billing Details</h2>
				<hr>
				<div class="row checkout-form">
					<div class="col-md-6">
						<label for="">Full Name:</label>
						<input type="text" name="fullname" class="form-control" placeholder="Enter Your Name">
					</div>
					<div class="col-md-6">
						<label for="">Email:</label>
						<input type="text" name="email" class="form-control" placeholder="Enter Your Email">
					</div>
					<div class="col-md-6">
						<label for="">Phone:</label>
						<input type="text" name="phone" class="form-control" placeholder="Enter Your Phone">
					</div>
					<div class="col-md-6">
						<label for="">Address:</label>
						<input type="text" name="address" class="form-control" placeholder="Enter Your Address">
					</div>
				</div>
			</div>
		    </div>
		</div>
		<div class="col-md-5">
		<div class="card">
			<div class="card-body">
			<h2>Order Details</h2>
			<hr>
			@foreach($cartitem as $item)
			{{ $item->posts->product_id }}
			@endforeach
		</div>
		
			<button type="submit" class="btn btn-primary">Please Order</button>
		
		</div>
	</div>
	</div>
</form>
</div>
@endsection