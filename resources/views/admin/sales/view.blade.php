@extends('layouts.app')
@section('content')
    <div class="container">
         @if (session('dangerMsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('dangerMsg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Customer name</th>
      <th scope="col">Phone</th>
      <th scope="col">Total bill</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($sales as $item)
        
        <tr>
        <td>#{{ $item->id }}</td>
        <td>{{ $item->customer_name }}</td>
        <td>{{ $item->customer_phone }}</td>
        <td>${{ $item->total_bill }}</td>
        <td>
            <a href="{{ url('/salesDetails'.'/'.$item->id) }}" class="btn btn-sm btn-primary">Details</a>
            <a href="{{ url('/salesDelete'.'/'.$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
        
        </td>
        </tr>
    @empty
        
    @endforelse
   
  </tbody>
</table>
    </div>
@endsection