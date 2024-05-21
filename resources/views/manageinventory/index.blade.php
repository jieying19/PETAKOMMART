@extends('layouts.sideNav')
@section('content')
<div class="container">
    <h1>Inventory Details</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventorys as $item)
                    <tr>
                        <td>{{ $item->productcode }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>
                            @if($item->quantity < 50)
                                <span style="color: red;">Low</span>
                            @else
                                <span style="color: green;">High</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('inventorys.delete', $item->itemID) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{ route('inventorys.edit', $item->itemID) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <tr>
                <td><a href="{{ route('inventorys.create') }}" class="btn btn-success">Add New Inventory</a></td>
            </tr>
    </div>
@endsection
