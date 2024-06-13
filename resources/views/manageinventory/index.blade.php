@extends('layouts.sideNav')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>


<div class="container">
    <h1>Inventory Details</h1>
  
    <form class="search-form" action="{{ route('inventory.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search products..." required>
        <button type="submit">
            <i class="fa fa-search"></i> <!-- FontAwesome icon -->
        </button>
    </form>

    <form action="{{ route('inventory.index') }}" method="GET">
        <label for="category">Select To Sory By Category:</label>
        <select name="product_category" id="product_category">
        <option value="" disabled>Select Category</option>
     
            @foreach($categories as $cat)
            <option value="{{ $cat }}" {{ request('product_category') == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

    <!-- Barcode Scanner Interface -->
    <div id="barcode-scanner">
        <button id="start-scan">Start Scan</button>
        <button id="stop-scan" style="display: none;">Stop Scan</button>
        <div id="scanner-container" style="display: none;">
            <video id="scanner"></video>
            <div id="interactive" class="viewport"></div>
        </div>
    </div>

    <div class="table container">
    <table class="table table-striped">
        <thead class="thead-dark">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Stock</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventorys as $item)
                    <tr>
                        <td>{{ $item->productcode }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_category }}</td>
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
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
<script>
document.getElementById('start-scan').addEventListener('click', function() {
    document.getElementById('scanner-container').style.display = 'block';
    document.getElementById('stop-scan').style.display = 'inline';
    document.getElementById('start-scan').style.display = 'none';
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#interactive')    // Or '#yourElement' (optional)
        },
        decoder: {
            readers: ["code_128_reader"] // List of active readers
        },
    }, function(err) {
        if (err) {
            console.log(err);
            return;
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
    });

    Quagga.onDetected(function(data) {
        console.log(data.codeResult.code);
        alert('Barcode detected: ' + data.codeResult.code);
        // Here, you can send the barcode data to your server or process it further
    });
});

document.getElementById('stop-scan').addEventListener('click', function() {
    Quagga.stop();
    document.getElementById('scanner-container').style.display = 'none';
    document.getElementById('stop-scan').style.display = 'none';
    document.getElementById('start-scan').style.display = 'inline';
});
</script>
    <style>
    .search-form {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .table-container {
        margin-top: 20px;
    }
    </style>
@endsection
