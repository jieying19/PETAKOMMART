@extends('layouts.sideNav')

@section('content')
    <div class="container">
        <h2>Checkout</h2>

        <!-- Display cart items and total purchase -->

        <div>
            <h4>Cart Items:</h4>
            <ul>
                @foreach ($cartItems as $item)
                    <li>{{ $item['item_name'] }} - {{ $item['quantity'] }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h4>Total Purchase: ${{ $totalPurchase }}</h4>
        </div>

        <!-- Payment method selection modal -->
        <div class="modal" id="paymentMethodModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Please select your preferred payment method:</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethodQR" value="qr">
                            <label class="form-check-label" for="paymentMethodQR">
                                QR Code
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethodCash" value="cash">
                            <label class="form-check-label" for="paymentMethodCash">
                                Cash
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="confirmPaymentBtn">Confirm Payment</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#paymentMethodModal').modal('show');

                // Handle Confirm Payment button click
                document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
                    var paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

                    // Redirect to the appropriate payment route based on the selected payment method
                    if (paymentMethod === 'qr') {
                        // Redirect to QR payment route
                        window.location.href = "{{ route('payments.qr') }}";
                    } else {
                        // Redirect to cash payment route
                        window.location.href = "{{ route('payments.cash') }}";
                    }
                });
            });
        </script>
    </div>
@endsection
