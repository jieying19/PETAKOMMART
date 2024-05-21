<!-- cash.blade.php -->
@extends('layouts.sideNav')

@section('content')

    <div class="container">
        <h2>Cash Interface</h2>

        <div>
            <h4>Total Purchase: RM{{ $totalPurchase }}</h4>
        </div>

        <div>
            <label for="amountGiven">Amount Given:</label>
            <input type="number" id="amountGiven" name="amountGiven" step="0.01" min="0" required>
        </div>

        <div>
            <label for="change">Change:</label>
            <input type="number" id="change" name="change" step="0.01" min="0" readonly>
        </div>

        <div>
            <button id="calculateButton" class="btn btn-primary">Calculate</button>
        </div>

        <form id="doneForm" action="{{ route('payments.index') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Done</button>
        </form>

    </div>
    <style>
        /* Custom CSS styles */
        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        h2 {
            color: #333;
        }

        label {
            font-weight: bold;
        }

        input[type="number"] {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 10px;
        }
    </style>

    <script>
        // Existing JavaScript code
        document.addEventListener('DOMContentLoaded', function() {
            var amountGivenInput = document.getElementById('amountGiven');
            var changeInput = document.getElementById('change');
            var calculateButton = document.getElementById('calculateButton');

            calculateButton.addEventListener('click', function() {
                var amountGiven = parseFloat(amountGivenInput.value);
                var change = amountGiven - {{ $totalPurchase }};
                changeInput.value = change.toFixed(2);
            });
        });
    </script>
@endsection
