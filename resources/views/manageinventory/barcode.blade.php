<!DOCTYPE html>
<html>
<head>
    <title>Product Barcode</title>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode/dist/JsBarcode.all.min.js"></script>
</head>
<body>
    <svg id="barcode"></svg>

    <script>
        // Generate barcode
        JsBarcode("#barcode", "{{ $product->product_code }}", {
            format: "CODE128",  // Choose barcode type, such as CODE128, EAN-13, etc.
            displayValue: true, // Display the product code below the barcode
            fontSize: 14        // Adjust font size of the displayed product code
        });
    </script>
</body>
</html>
