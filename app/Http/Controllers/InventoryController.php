<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Writer;

class InventoryController extends Controller
{

    public function index(Request $request)
    {
        $category = $request->input('product_category');
        $sort_by = $request->input('sort_by', 'itemID'); // Default sort by name
        $sort_order = $request->input('sort_order', 'asc'); // Default sort order ascending

        $query = Inventory::query();

        if ($category) {
            $query->where('product_category', $category);
        }

        $inventorys = $query->orderBy($sort_by, $sort_order)->get();

       // Retrieve distinct categories for dropdown and filter out empty or null values
    $categories = Inventory::select('product_category')
    ->distinct()
    ->whereNotNull('product_category')
    ->where('product_category', '!=', '')
    ->pluck('product_category')
    ->map(function ($category) {
        return trim($category);
    })
    ->unique() 
    ->values()
    ->all();

        return view('manageinventory.index', compact('inventorys', 'category', 'sort_by', 'sort_order', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $inventorys = Inventory::where('product_name', 'LIKE', "%{$query}%")->get();

        return view('manageinventory.index', compact('inventorys'));

    }



    function create()
    {
        return view('manageinventory.create');
    }

    //process store
    function store(Request $request)
    {
        //validate syarat untuk input macam ic kena masuk nombor
        $validatedData = $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Generate QR code
        $qrCode = $this->generateQRCode($validatedData['product_code']);

        $inventory = new Inventory();
        $inventory->product_code = $validatedData['product_code'];
        $inventory->product_name = $validatedData['product_name'];
        $inventory->quantity = $validatedData['quantity'];
        $inventory->price = $validatedData['price'];
        $inventory->amount = $validatedData['amount'];
        $inventory->stock = $validatedData['stock'];
        $inventory->barcode = $qrCode; // Store barcode in database
        $inventory->save();
        // Redirect to the desired page
        return redirect()->route('inventorys');
    }

public function edit($id)
{
    $item = Inventory::find($id);
    return view('manageinventory.edit', compact('item'));
}

public function update($id, request $request)
{
    $validatedData = $request->validate([
        'productcode' => 'required',
        'product_name' => 'required',
        'product_category' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'amount' => 'required',
        'stock' => 'required',
    ]);

    $item = Inventory::find($id);
    $item->update($validatedData);

    return redirect()->route('inventorys')->with('success', 'Inventory updated successfully');
}
    //process delete
    function delete($id)
    {
        $item = Inventory::find($id);
        //insert data to database
        $item->delete();
        return redirect()->route('inventorys');
    }

    public function scanBarcode(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'barcode' => 'required|string'
        ]);

        // Handle scanned barcode (e.g., find product by barcode, update inventory, etc.)
        $barcode = $request->input('barcode');

        // Example: Find product by barcode in your database
        $product = Inventory::where('barcode', $barcode)->first();

        if ($product) {
            // Product found, return success response (you can adjust as needed)
            return response()->json(['success' => true, 'message' => 'Product found.', 'product' => $product]);
        } else {
            // Product not found, return error response
            return response()->json(['success' => false, 'message' => 'Product not found.']);
        }
    }
/*
    public function addInventory()
    {
        return view('manageinventory.addinventory');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'stock' => 'required',
            // Add validation rules for other profile attributes here
        ]);

        Inventory::create($validatedData);

        return redirect()->back()->with('success', 'Inventory added successfully!');
    }*/
}
