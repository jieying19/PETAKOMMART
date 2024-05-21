@extends('layouts.sideNav')
@section('content')
<!-- Display success message if any -->
@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<!-- Item form -->
<form action="{{ route('payment.cart') }}" method="POST">
    @csrf
    <label for="purchase_item">Item Purchase:</label>
    <input type="text" name="purchase_item" required>
    <br>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" required>
    <br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required>
    <br>

    <button type="submit">Add to Cart</button>
</form>
@endsection