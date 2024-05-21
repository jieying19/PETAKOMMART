<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    function index()
    {
        $users = User::get(); //select * from user database
        return view(
            'manageuser.index',
            compact('users')
        );
    }

    function create()
    {
        return view('manageuser.createprofile');
    }

    //process store
    function store(Request $request)
    {
        //validate syarat untuk input macam ic kena masuk nombor
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' =>'required',
            'category' => 'required',
            'gender' => 'required',
            'phoneNum' => 'required',
        ]);
        //insert data to db
        User::create(
           $validator -> validate()
        );
    
        // Redirect to the desired page
        return redirect()->route('users');
    }


public function edit($id)
{
    $user = User::find($id);
    return view('manageuser.editprofile', compact('user'));
}
public function update(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'phoneNum' => 'required|string|max:255',
        'category' => 'required|in:Admin,Cashier',
        'gender' => 'required|in:Male,Female',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's attributes
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->phoneNum = $validatedData['phoneNum'];
    $user->category = $validatedData['category'];
    $user->gender = $validatedData['gender'];

    // Save the updated user
    $user->save();

    // Redirect the user to their updated profile or any other appropriate page
    return redirect()->route('users', $user->id)->with('success', 'Profile updated successfully');
}


// public function update($id, request $request)
// {
//     $validatedData = $request->validate([
//         'name' => 'required',
//         'email' => 'required',
//         'password' =>'required',
//         'category' => 'required',
//         'gender' => 'required',
//         'phoneNum' => 'required',
//     ]);

//     $user= User::find($id);
//     $user->update($validatedData);

//     return redirect()->route('users')->with('success', 'Profile updated successfully');
// }
    //process delete
    function delete($id)
    {
        $item = User::find($id);
        //insert data to database
        $item->delete();
        return redirect()->route('users');
    }
}