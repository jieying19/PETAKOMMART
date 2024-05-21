@extends('layouts.sideNav')
@section('content')
<div class="container">
        <h1>User Details</h1>
        <table class="table">
            <thead>
                <tr>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Category</th>
                     <th>Gender</th>
                     <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->category }}</td>
                     <td>{{ $user->gender }}</td>
                     <td>{{ $user->phoneNum }}</td>
                     <td>
                     <form action="{{route('users.delete', $user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                     </td>
                     <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
<tr>

        <td><a href = "{{route('users.create') }}" class="btn btn-success">Add New User</a></td>
        </tr>  </table>
        
    </div>
@endsection