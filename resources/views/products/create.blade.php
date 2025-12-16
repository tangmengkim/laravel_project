@extends('layouts.app')
@section('title', 'Create Product')

@section('content')
  <div class="container border p-4 mt-4 rounded-3 bg-secondary bg-opacity-10">
  
    <form method="POST" action="{{ route('products.store') }}" needs-validation>
      @csrf
      <h1 class="text-center ">Create Product</h1>
      <div class="my-3">
        <label for="titleText" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="titleText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="qtyText" class="form-label">Qty</label>
        <input type="number" name="qty" class="form-control" id="qtyText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="priceText" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="priceText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="inStockText" class="form-label">In Stock</label>
        <input type="checkbox" value="1" name="in_stock" class="form-check-input" id="inStockText"
          aria-describedby="emailHelp">
      </div>
  
      <button type="submit" class="btn btn-primary">Create</button>
      <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
@endsection