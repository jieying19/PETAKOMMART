@extends('layouts.sideNav')
@section('content')

<div class="container">
    <h1>Schedule Details</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Schedule ID</th>
                <th>Schedule Date</th>
                <th>Schedule Time</th>
                <th>Total Schedule Duty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_schedule as $sched)
                <tr>
                    <td>{{ $sched->id }}</td>
                    <td>{{ $sched->SchedDate }}</td>
                    <td>{{ $sched->Schedtime }}</td>
                    <td>{{ $sched->SchedTotalDuty }}</td>
                    <td>
                        {{-- <form action="{{route('inventorys.delete', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete blog</button>
                        </form> --}}
                    </td>
                    {{-- <td><a href="{{route('ManageSchedule.UpdateorDelete', $data_schedule->id)}}">Edit</a></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('ManageSchedule.AddSchedule') }}">new schedule</a> 
</div>
@endsection
