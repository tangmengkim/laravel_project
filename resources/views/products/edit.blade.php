@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
  <div class="container border p-4 mt-4 rounded-3 bg-secondary bg-opacity-10">

    <form method="POST" action="{{ route('products.update', $product->pid) }}">
      @csrf
      @method('PUT')
      <h1 class="text-center " >Edit Product</h1>
      <div class="my-3">
        <label for="pidText" class="form-label">PID</label>
        <input type="text" name="pid" disabled value="{{ $product->pid }}" class="form-control" id="pidText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="titleText" class="form-label">Title</label>
        <input type="text" name="title" value="{{ $product->title }}" class="form-control" id="titleText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="qtyText" class="form-label">Qty</label>
        <input type="number" name="qty" value="{{ $product->qty }}" class="form-control" id="qtyText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="priceText" class="form-label">Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="priceText" aria-describedby="emailHelp">
      </div>
      <div class="my-3">
        <label for="inStockText" class="form-label">In Stock</label>
        <input type="checkbox" name="in_stock" value="1" class="form-check-input" id="inStockText" aria-describedby="emailHelp" {{ old('in_stock', $product->in_stock ?? false) ? 'checked' : '' }}>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
      <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
@endsection