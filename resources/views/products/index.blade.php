@extends('layouts.app')

@section('title', 'Products List')

@section('content')
  <div  class="container">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>

    <table class="table table-light table-hover align-middle">
    <thead class="table table-primary">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>In Stock</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="table table-light">
      @foreach ($products as $product)
        <tr>
          <td>{{ $product->pid }}</td>
          <td>{{ $product->title }}</td>
          <td>{{ $product->qty }}</td>
          <td>{{ $product->price }}</td>
          <td>
            @if ($product->in_stock)
            <span class="badge bg-primary text-white">Instock</span>
            @else <span class="badge bg-danger text-white">Out of stock</span>
            @endif
          </td>

          <td>
            <a href="#" class="btn btn-primary">View</a>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary">Edit</a>
            <form action="{{ route('products.destroy', $product->pid) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-danger btn-delete">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{  $products->links('pagination::bootstrap-5') }}
  </div>
@endsection