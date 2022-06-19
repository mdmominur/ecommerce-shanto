@extends('layouts.app')
@section('content')
<style>
    table tr td{padding: 20px 10px;}
</style>
<div class="container">

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Customer details
                </div>
                <div class="card-body">
                    <table style="width: 100%">
                        <tr>
                            <td><span class="text-nowrap"> Customer Name</span></td>
                            <td>:</td>
                            <td><span class="fw-bold">{{ $sales->customer_name }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="text-nowrap"> Customer phone</span></td>
                            <td>:</td>
                            <td><span class="fw-bold">{{ $sales->customer_phone }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="text-nowrap"> Customer email</span></td>
                            <td>:</td>
                            <td><span class="fw-bold">{{ $sales->customer_email }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="text-nowrap"> Customer address</span></td>
                            <td>:</td>
                            <td><span class="fw-bold">{{ $sales->customer_address }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5>Products</h5>
 <table class="table">
      <thead>
        <tr>
    
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @forelse ($products as $item)
                @php
                    $totalPrice += $item->price;
                @endphp
            <tr>
            
            <td style="width:200px">
                <img src="{{ asset('/cover'.'/'.$item->cover) }}" width="100" >
            </td>
            <td>{{ $item->title }}</td>
            <td>${{ $item->price }}</td>
           
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
    </div>
</div>
@endsection