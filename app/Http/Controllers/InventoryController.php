<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    function index()
    {
        $inventorys = Inventory::get(); //select * from user database
        return view(
            'manageinventory.index',
            compact('inventorys')
        );
    }

    function create()
    {
        return view('manageinventory.create');
    }

    //process store
    function store(Request $request)
    {
        //validate syarat untuk input macam ic kena masuk nombor
        $validator = Validator::make($request->all(), [
            'productcode' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'stock' => 'required',
        ]);
        //insert data to db
        Inventory::create(
           $validator -> validate()
           /* //key guna nama dalam db -> $request->title (nama dalam form)
            "title" => $request->title,
            "description" => $request->description,
            */
        );
    
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
