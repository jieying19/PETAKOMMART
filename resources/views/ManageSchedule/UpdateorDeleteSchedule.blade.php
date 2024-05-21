@extends('layouts.sideNav')
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/addSchedule.css') }}">
        <style>
            .container {
                /* border: px outset red; */
                background-color: #D8BFD8;
                text-align: left;
            }

            .shadow-box {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 4px;
                padding: 20px;
                background-color: #fff;
            }

            .blue-button {
                background-color: #4C62F6;
                color: white;
                padding: 5px 10px;
                border-radius: 4px;
                border: 1px solid blue;
                /* Add border style */
                cursor: pointer;
            }

            .delete-button {
                background-color: white;
                /* color: white; */
                padding: 5px 10px;
                border-radius: 4px;
                border: 1px solid black;
                /* Add border style */
                cursor: pointer;
            }
        </style>
        <script>
            function favTutorial() {
                var mylist = document.getElementById("myList");
                document.getElementById("favourite").value = mylist.options[mylist.selectedIndex].text;
            }
        </script>
    </head>

    <div class="shadow-box">
        <h1>Update Schedule</h1>
        <br>
        <form action="/ManageSchedule/{{ $data_schedule->id }}/update" method="POST">
            {{ csrf_field() }}
            <label for="Date"> Date:</label>
            <input type="date" id="SchedDate" name="SchedDate" value="{{ $data_schedule->SchedDate }}"><br>

            <label for="Time"> Time:</label>
            <select id="Schedtime" name="Schedtime">
                <option value="{{ $data_schedule->Schedtime }}" hidden>{{ $data_schedule->Schedtime }}</option>
                <option value="8am-9am">8am-9am</option>
                <option value="9am-10am">9am-10am</option>
                <option value="10am-11am">10am-11am</option>
                <option value="12pm-1pm">12pm-1pm</option>
            </select>

            <br><br>

            <label for="PETAKOM Committee"> PETAKOM Committee:</label>
            <select id="myList" onchange="favTutorial()" name="Incharge">
                <option value="{{ $data_schedule->Incharge }}">{{ $data_schedule->Incharge }}</option>
                <input type="text" id="favourite" size="20" name="Incharge" value="{{ $data_schedule->Incharge }}"
                    hidden>
            </select>
            <br>

            {{-- <label for="Staff"> Staff:</label>
            <select name="name" id="name">
                <option value="{{ $data_user->name }}" hidden>{{ $data_user->name }}</option>
                @foreach ($data_user as $user)
                    @if ($data_schedule->id == $user->id)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select> --}}

            <br>

            <div class="row">
                <input type="submit" value="Update" class="blue-button">
                &nbsp;&nbsp;&nbsp;
                <a href="/ManageSchedule/{{ $data_schedule->id }}/delete"><input type="button" value="Delete"
                        class="delete-button" onclick="return confirm('Are You Sure?')"></a>
            </div>


        </form>
    </div>
@endsection
