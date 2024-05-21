<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{


    //add schedule
    public function create(Request $request)
    {
        \App\Models\schedule::create($request->all());
        return redirect('/ManageSchedule');
    }

    //edit schedule
    public function edit($id)
    {
        $data_schedule = \App\Models\Schedule::find($id);
        $data_user = \App\Models\User::find($id);
        // dd($data_schedule);
        return view('ManageSchedule/UpdateorDeleteSchedule', ['data_schedule' => $data_schedule, 'data_user' => $data_user]);
    }

    public function update(Request $request, $id)
    {
        $data_schedule = \App\Models\Schedule::find($id);
        $data_schedule->update($request->all());
        // dd($data_schedule);
        return redirect('/ManageSchedule');
    }

    //delete function
    public function delete($id)
    {
        $data_schedule = \App\Models\schedule::find($id);
        $data_schedule->delete($data_schedule);
        return redirect('/ManageSchedule');
    }

    public function index()
    {
        $data_schedule = \App\Models\Schedule::all();
        $data_user = \App\Models\User::all();
        return view('ManageSchedule/AddSchedule', ['data_schedule' => $data_schedule, 'data_user' => $data_user]);
    }

    public function dropDownShow(Request $request)

    {

        $items = \App\Models\User::pluck('name', 'id');

        $selectedID = 2;

        return view('ManageSchedule/AddSchedule', compact('id', 'items'));
    }
}
