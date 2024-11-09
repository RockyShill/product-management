@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ $product->name }}
    </div>
    <div class="card-body">
        <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        @else
            <p>No image available.</p>
        @endif
    </div>
</div>
@endsection
