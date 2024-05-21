@extends('layouts.sideNav')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Inventory</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('inventorys.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="productcode">Product Code</label>
                                <input id="productcode" type="text" class="form-control" name="productcode" required>
                            </div>

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input id="product_name" type="text" class="form-control" name="product_name" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" type="quantity" class="form-control" name="quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="price" class="form-control" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input id="amount" type="amount" class="form-control" name="amount" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input id="stock" type="stock" class="form-control" name="stock" readonly required>
                            </div>

                            <!-- Add more fields for profile attributes here -->

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const quantityInput = document.getElementById('quantity');
                                    const priceInput = document.getElementById('price');
                                    const amountInput = document.getElementById('amount');
                                    const stockInput = document.getElementById('stock');
                                    const lowStock = 50; // Define the threshold for low stock

                                    quantityInput.addEventListener('input', function() {
                                        const quantity = parseFloat(quantityInput.value);
                                        const price = parseFloat(priceInput.value);
                                        const amount = quantity * price;
                                        amountInput.value = isNaN(amount) ? '' : amount.toFixed(2);
                                        stockInput.value = quantity < lowStock ? 'Low' : 'High';
                                    });

                                    priceInput.addEventListener('input', function() {
                                        const quantity = parseFloat(quantityInput.value);
                                        const price = parseFloat(priceInput.value);
                                        const amount = quantity * price;
                                        amountInput.value = isNaN(amount) ? '' : amount.toFixed(2);
                                    });
                                });
                            </script>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Inventory</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
