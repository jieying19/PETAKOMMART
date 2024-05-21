@extends('layouts.sideNav')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Cashier Interface</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .form {
            width: 45%;
        }
        .cart {
            width: 45%;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Item Entry Form -->
                <div class="card">
                    <div class="card-header">Enter Item Details</div>
                    <div class="card-body">
                        <form action="{{ route('payments.addToCart') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="item_id">Customer Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="item_id">Item ID</label>
                                <input type="text" name="item_id" id="item_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Cart -->
                <div class="card">
                    <div class="card-header">Cart</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>{{ $item['item_name'] }}</td>
                                        <td>{{ $item['quantity'] }}</td> 
                                        <td>{{ $item['price_per_item'] }}</td>
                                        <td>{{ $item['total_price_per_item'] }}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="text-right">
                            <h5>Total Purchase: RM{{ $totalPurchase }}</h5>
                            <a href="{{ route('payments.checkout') }}" class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection