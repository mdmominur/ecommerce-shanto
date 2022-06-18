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

{{-- Checkout --}}

<div>
    <h2>Billing option</h2>
    <h2>Billing option2</h2>
    
    <a href="" class="btn btn-success w-100">Checkout</a>
</div>


</div>
@endsection