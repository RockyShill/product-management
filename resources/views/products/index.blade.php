@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>All Products</h2>
    <form method="GET" action="{{ route('products.index') }}" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by ID or Description" value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>
</div>

<div class="mb-2">
    <a href="{{ route('products.index', ['sort' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}" class="btn btn-link">Sort by Name</a>
    <a href="{{ route('products.index', ['sort' => 'price', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}" class="btn btn-link">Sort by Price</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->product_id }}</td>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>
                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links('pagination::bootstrap-5') }}
@endsection
