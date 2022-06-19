@extends('frontend.master')

@section('content')
<div class="container my-5 vh-100">

    <div class="col-md-6 mx-auto my-0">
        @if (session('dangerMsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('dangerMsg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('successMsg'))
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('successMsg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table">
      <thead>
        <tr>
    
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
            $totalPrice = 0;
        @endphp
        @forelse ($carts as $item)
             @php
                 $totalPrice += $item->getProduct->price;
             @endphp
        <tr>
          
          <td style="width:200px">
            <img src="{{ asset('/cover'.'/'.$item->getProduct->cover) }}" width="100" >
          </td>
          <td>{{ $item->getProduct->title }}</td>
          <td>${{ $item->getProduct->price }}</td>
          <td>
            <a class="btn btn-sm btn-danger" href="{{ url('cart-remove'.'/'.$item->id) }}">Remove</a>
          </td>
        </tr>
        @empty
            <tr>
                <td colspan="100">No products are added to the cart.</td>
            </tr>
        @endforelse
        <tr>
            <td colspan="2">
                Total
            </td>
            <td> ${{ $totalPrice }}</td>
            <td></td>
        </tr>
      </tbody>
    </table>
</div>
{{ $carts->links() }}

@if (!!$carts->count())
    
{{-- Checkout --}}
<div class="col-md-6 mx-auto my-0">
    <form action="{{ url('place-order') }}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				<h2>Billing Details</h2>
				<hr>
				<div class="row checkout-form">
					<div class="col-md-12">
						<label for="">Full Name:</label>
						<input type="text" name="fullname" class="form-control" placeholder="Enter Your Name">
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>
					<div class="col-md-6">
						<label for="">Email:</label>
						<input type="text" name="email" class="form-control" placeholder="Enter Your Email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>
					<div class="col-md-6">
						<label for="">Phone:</label>
						<input type="text" name="phone" class="form-control" placeholder="Enter Your Phone">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>
					<div class="col-md-12">
						<label for="">Address:</label>
            <textarea name="address" class="form-control" placeholder="Enter Your Address" cols="30" rows="5"></textarea>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>
				</div>
			</div>
		    </div>
		</div>
		
    <button type="submit" class="btn btn-success w-100">Process To Checkout</button>
	</div>
</form>
</div>
@endif


</div>
@endsection